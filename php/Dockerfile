FROM php:fpm-alpine

WORKDIR /app

COPY php.ini /usr/local/etc/php/php.ini

RUN docker-php-ext-install pdo pdo_mysql

