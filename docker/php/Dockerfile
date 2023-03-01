FROM php:8.0-apache

COPY php.ini /user/local/etc/php/
COPY 000-default.conf /etc/apache2/sites-enabled/

RUN apt-get update \
    && apt-get install -y zlib1g-dev mariadb-client vim libzip-dev \
    && docker-php-ext-install zip pdo_mysql 

RUN cd /etc/apache2/mods-enabled \
    && ln -s ../mods-available/rewrite.load

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

RUN php -r "copy('https://getcomposer.org/installer','composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV TZ Asia/Tokyo

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www

RUN composer global require "laravel/installer"