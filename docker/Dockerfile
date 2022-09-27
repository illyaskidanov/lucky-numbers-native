FROM php:8.1-apache

# [XDEBUG]

ENV XDEBUG_VERSION="3.1.5"

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN mkdir -p /usr/src/php/ext/xdebug \
    && php -r "readfile('https://xdebug.org/files/xdebug-3.2.0alpha3.tgz');" | tar xvz -C /usr/src/php/ext/xdebug --strip 1 \
    && docker-php-ext-install xdebug

WORKDIR /var/www/html

# [APACHE]

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data
