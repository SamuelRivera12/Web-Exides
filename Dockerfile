# Etapa 1: Build frontend
FROM node:18-alpine AS frontend

WORKDIR /app

# Instalar herramientas de build para dependencias nativas
RUN apk add --no-cache python3 make g++ linux-headers

# Copiar archivos de dependencias
COPY package.json ./
COPY package-lock.json* ./

# Limpiar cache y instalar dependencias de forma robusta
RUN npm cache clean --force || true
RUN npm install --production=false --no-optional || npm install --legacy-peer-deps || npm install --force

# Copiar código fuente
COPY . .

# Compilar assets para producción
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

# Crear script de inicio
RUN echo '#!/bin/bash\n\
set -e\n\
\n\
# Esperar a que la base de datos esté disponible\n\
echo "Waiting for database..."\n\
until php artisan migrate:status > /dev/null 2>&1; do\n\
    echo "Database not ready, waiting..."\n\
    sleep 2\n\
done\n\
\n\
# Ejecutar migraciones\n\
echo "Running migrations..."\n\
php artisan migrate --force\n\
\n\
# Iniciar Apache\n\
echo "Starting Apache..."\n\
exec apache2-foreground' > /start.sh \
    && chmod +x /start.sh

EXPOSE 80

# Usar script de inicio
CMD ["/start.sh"]