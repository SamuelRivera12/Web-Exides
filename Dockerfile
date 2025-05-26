FROM php:8.2-apache

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

RUN a2enmod rewrite

# Configurar DocumentRoot a public/
RUN echo "<VirtualHost *:80>
    DocumentRoot /var/www/html/public
    <Directory /var/www/html/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
