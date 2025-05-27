# Etapa 1: Build frontend (solución para lightningcss)
FROM node:18-alpine AS frontend

WORKDIR /app

# Instalar dependencias básicas
RUN apk add --no-cache python3 make g++

# Copiar solo package.json (SIN package-lock.json)
COPY package.json ./

# Regenerar package-lock.json limpio para Linux
RUN npm install --package-lock-only

# Instalar dependencias (esto creará las versiones correctas para Linux)
RUN npm install

# Copiar código y compilar
COPY . .
RUN npm run build

# Etapa 2: Aplicación PHP
FROM php:8.2-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libssl-dev \
    gnupg \
    && docker-php-ext-install pdo pdo_mysql zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# SQL Server drivers
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/debian/11/prod.list > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get update \
    && ACCEPT_EULA=Y apt-get install -y msodbcsql17 unixodbc-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar archivos de dependencias PHP primero (para cache)
COPY composer.json composer.lock ./

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copiar el resto de la aplicación
COPY . .

# Copiar assets compilados desde la etapa frontend
COPY --from=frontend /app/public/build ./public/build

# Ejecutar scripts post-install de Composer
RUN composer run-script post-autoload-dump

# Optimizar Laravel para producción
RUN php artisan config:cache || echo "Config cache failed, continuing..." \
    && php artisan route:cache || echo "Route cache failed, continuing..." \
    && php artisan view:cache || echo "View cache failed, continuing..."

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Configurar Apache para Laravel
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Configurar directorio público de Apache
RUN echo '<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
    DirectoryIndex index.php\n\
</Directory>' > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

# Crear script de inicio simple con PHP server
RUN echo '#!/bin/bash\n\
set -e\n\
\n\
# Configurar puerto dinámico para Render\n\
export PORT=${PORT:-8000}\n\
echo "Using port: $PORT"\n\
\n\
# Esperar a que la base de datos esté disponible (opcional)\n\
if [ "$DB_CONNECTION" != "" ] && [ "$DB_CONNECTION" != "sqlite" ]; then\n\
    echo "Waiting for database..."\n\
    timeout=30\n\
    while [ $timeout -gt 0 ]; do\n\
        if php artisan migrate:status > /dev/null 2>&1; then\n\
            echo "Database is ready"\n\
            break\n\
        fi\n\
        echo "Database not ready, waiting... ($timeout seconds left)"\n\
        sleep 2\n\
        timeout=$((timeout-2))\n\
    done\n\
    \n\
    # Ejecutar migraciones\n\
    echo "Running migrations..."\n\
    php artisan migrate --force || echo "Migration failed, continuing..."\n\
fi\n\
\n\
# Iniciar servidor PHP\n\
echo "Starting PHP server on port $PORT..."\n\
exec php artisan serve --host=0.0.0.0 --port=$PORT' > /start.sh \
    && chmod +x /start.sh

EXPOSE $PORT

# Usar script de inicio
CMD ["/start.sh"]