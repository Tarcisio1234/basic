FROM php:8.4.7-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar Laravel Installer
RUN composer global require laravel/installer

# Adiciona binários globais no PATH
ENV PATH="/root/.composer/vendor/bin:${PATH}"

WORKDIR /var/www/html