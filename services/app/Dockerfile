# services/app/Dockerfile
FROM php:8.1-fpm

# Instalar dependencias del sistema y extensiones PHP necesarias
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libonig-dev libpng-dev libjpeg-dev libfreetype6-dev \
    libxml2-dev libicu-dev libpng-dev libjpeg62-turbo-dev libssl-dev curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Instalar Composer (global)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Crear usuario www-data y directorio app
WORKDIR /var/www/html
RUN chown -R www-data:www-data /var/www/html

# Copiar composer.json primero para cachear vendor
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-scripts --no-progress --optimize-autoloader || true

# Copiar el resto de la aplicación
COPY . .

# copiar entrypoint
COPY services/app/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]

# Permisos para storage y cache
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Puerto expuesto (php-fpm)
EXPOSE 9000

# CMD por defecto (php-fpm)
CMD ["php-fpm"]
