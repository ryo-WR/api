# Dockerfile
FROM php:8.3.14-fpm

# 必要なPHP拡張モジュールをインストール
RUN apt-get update && apt-get install -y \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

# Xdebug のインストール
RUN pecl install xdebug \ && docker-php-ext-enable xdebug

# Xdebug 設定を追加
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

