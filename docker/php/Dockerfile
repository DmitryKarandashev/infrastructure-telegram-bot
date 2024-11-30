# Используем официальный образ PHP 8.3
FROM php:8.3-fpm

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zlib1g-dev \
    libicu-dev \
    g++ \
    curl \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_pgsql zip intl

# Устанавливаем Redis расширение
RUN pecl install redis && docker-php-ext-enable redis

# Устанавливаем Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Настраиваем рабочую директорию
WORKDIR /var/www/application

# Копируем конфигурацию PHP
COPY docker/php/php.ini /usr/local/etc/php/

# Устанавливаем права доступа
RUN chown -R www-data:www-data /var/www/application \
    && chmod -R 755 /var/www/application

# Копируем файлы приложения
COPY ./applications/application /var/www/application

# Открываем порт для PHP-FPM
EXPOSE 9000

# Запускаем PHP-FPM
CMD ["php-fpm"]
