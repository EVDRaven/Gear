FROM php:8.2-fpm

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        curl \
        git \
        pkg-config \
        unzip \
        zip \
        libsqlite3-dev \
        libzip-dev \
        libonig-dev \
        libxml2-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install \
        bcmath \
        mbstring \
        pdo \
        pdo_mysql \
        pdo_sqlite \
        xml \
        zip

COPY --from=composer:2.8.5 /usr/bin/composer /usr/local/bin/composer
