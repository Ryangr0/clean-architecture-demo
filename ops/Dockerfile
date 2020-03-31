FROM php:7.4-apache

RUN docker-php-ext-install pdo pdo_mysql

COPY ./ops/apache/clean-architecture.conf /etc/apache2/sites-available/000-default.conf

COPY . /app

EXPOSE 80

ENTRYPOINT apache2-foreground
