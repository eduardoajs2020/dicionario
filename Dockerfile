FROM php:8.3-apache


# Extensões comuns

RUN docker-php-ext-install mysqli pdo pdo_mysql


# Copia aplicação

COPY . /var/www/html


# Habilita mod_rewrite

RUN a2enmod rewrite


EXPOSE 80