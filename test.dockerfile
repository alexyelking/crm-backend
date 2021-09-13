FROM php:7.4-apache


RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && a2enmod rewrite \
    && service apache2 restart


RUN rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html