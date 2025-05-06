FROM php:8.4-fpm-alpine

WORKDIR /var/www/proxyparts

RUN docker-php-ext-install pdo pdo_mysql