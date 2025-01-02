# Dockerfile
FROM php:8.3.14-fpm

# 必要なPHP拡張モジュールをインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Composerをインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# 権限を設定
RUN chown -R www-data:www-data /var/www

EXPOSE 9000
CMD ["php-fpm"]
