FROM php:fpm-alpine

# Base librairies

RUN apk update \
    && apk upgrade \
    && apk add --no-cache \
        alpine-sdk \
        nginx \
        supervisor \
        vim \
        unzip \
        git \
        bash \
        automake \
        autoconf \
        libtool \
        nasm \
        icu-dev \
        php7-mbstring \
        php7-intl \
        php7-opcache \
    && apk add yarn --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community \
    && apk add composer --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/testing \
    && rm -rf /tmp/* /var/cache/apk/*

# PHP configuration
COPY docker/php.ini /usr/local/etc/php/conf.d/custom.ini
RUN docker-php-ext-install intl mbstring opcache

# Nginx Configuration
COPY docker/nginx.conf /etc/nginx/conf.d/nginx.conf
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log \
    && rm -fr /etc/nginx/sites-enabled/* \
    && mkdir -p /run/nginx

# Supervisor configuration
COPY docker/supervisord.ini /etc/supervisor.d/supervisord.ini

# Composer - Build cache
COPY composer.* /tmp/
RUN cd /tmp \
    && composer install --no-autoloader --no-scripts

# Node - Build cache
ADD package.json /tmp/package.json
#ADD yarn.lock /tmp/yarn.lock
RUN cd /tmp && yarn install

# Source files
RUN mkdir -p /app
COPY . /app

# Composer - Install vendor (from cache if necessary)
RUN cd /app \
    && cp -a /tmp/vendor /app/ \
    && composer dump-autoload --optimize --no-dev --classmap-authoritative

# Node - Install packages
RUN cp -a /tmp/node_modules /app/

# Permissions
RUN rm -rf /app/var/cache/* \
    && chown -R www-data:www-data /app

# Webpack
RUN cd /app && yarn run encore production

EXPOSE 80
WORKDIR /app

# Launch Supervisor
ENTRYPOINT supervisord -c /etc/supervisord.conf
