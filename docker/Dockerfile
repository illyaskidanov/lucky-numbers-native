FROM php:7.4-apache

# [XDEBUG]

ENV XDEBUG_VERSION=2.9.7

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN mkdir -p /usr/src/php/ext/xdebug \
    && php -r "readfile('https://xdebug.org/files/xdebug-$XDEBUG_VERSION.tgz');" | tar xvz -C /usr/src/php/ext/xdebug --strip 1 \
    && docker-php-ext-install xdebug

WORKDIR /var/www/html

# [APACHE]

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data
