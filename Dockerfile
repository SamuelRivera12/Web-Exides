# Usa una imagen base oficial con PHP y Composer
FROM php:8.2-apache

# Instala dependencias necesarias
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

# Habilita el módulo rewrite de Apache
RUN a2enmod rewrite

# Cambia el DocumentRoot para que apunte a la carpeta public
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Copia los archivos del proyecto al contenedor
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Instala Composer desde la imagen oficial de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Da permisos a Laravel para que funcione correctamente
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expone el puerto 80 para que el contenedor sirva la web
EXPOSE 80
