FROM php:7.2-cli-alpine

WORKDIR /var/balance-service

RUN apk upgrade --update && apk add icu-dev bash git openssh-client postgresql-dev pcre-dev
RUN docker-php-ext-install opcache intl bcmath pgsql pdo pdo_pgsql

RUN apk add --no-cache --virtual .build-deps g++ autoconf make \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug --ini-name=xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_connect_back=on" >> /usr/local/etc/php/conf.d/xdebug.ini

COPY build/worker/php.ini /usr/local/etc/php/php.ini

ENTRYPOINT ["php", "bin/console", "iqoption:queue:listen", "--env=prod"]