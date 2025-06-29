# Estágio 1: Dependências do PHP com Composer
FROM composer:2 AS vendor

WORKDIR /app
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --no-interaction --no-dev --prefer-dist --no-scripts

# Estágio 2: Dependências do Node.js com NPM
FROM node:18 AS frontend

WORKDIR /app
COPY package.json package.json
COPY package-lock.json package-lock.json
COPY vite.config.js vite.config.js
COPY tailwind.config.js tailwind.config.js
COPY postcss.config.js postcss.config.js
COPY resources/ resources/
RUN npm install && npm run build

# Estágio 3: Construção Final da Aplicação
FROM php:8.3-fpm

WORKDIR /var/www/html

# Instala dependências do sistema e extensões PHP usando apt-get
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql bcmath zip

# Copia os arquivos da aplicação e as dependências instaladas
COPY . .
COPY --from=vendor /app/vendor/ ./vendor/
COPY --from=frontend /app/public/build ./public/build

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]