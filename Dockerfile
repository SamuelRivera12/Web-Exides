FROM php:8.2-apache

# Instalar dependencias
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
    && docker-php-ext-install pdo pdo_mysql zip

# SQL Server drivers
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/debian/10/prod.list > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get update \
    && ACCEPT_EULA=Y apt-get install -y msodbcsql17 unixodbc-dev

RUN pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar archivos primero
COPY . /var/www/html
WORKDIR /var/www/html

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar Node.js y npm para compilar assets
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Instalar dependencias de Node.js (incluyendo SASS)
RUN npm install
# Asegurar que sass esté instalado
RUN npm install -D sass

# Compilar assets (SASS + React)
RUN npm run build

# Crear enlaces simbólicos para storage (si usas storage público)
RUN php artisan storage:link || true

# Generar clave de aplicación
RUN php artisan key:generate --force || true

# Limpiar cache y optimizar para producción
RUN php artisan config:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Configuración adicional del VirtualHost
RUN echo "<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
        DirectoryIndex index.php index.html\n\
    </Directory>\n\
    <Directory /var/www/html>\n\
        Options -Indexes\n\
    </Directory>\n\
    # Configuración para assets estáticos\n\
    <LocationMatch \"\\.(css|js|png|jpg|jpeg|gif|ico|svg)$\">\n\
        ExpiresActive On\n\
        ExpiresDefault \"access plus 1 month\"\n\
        Header append Vary Accept-Encoding\n\
    </LocationMatch>\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

# Habilitar módulos necesarios para assets
RUN a2enmod expires headers

EXPOSE 80