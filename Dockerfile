FROM php:7.4.9-fpm-alpine
WORKDIR /var/www
RUN docker-php-ext-install pdo pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
