# =============================================================================
# Production image: nginx + php-fpm + supervisor
# Build:  docker build -t davioliveira-portfolio .
# Run:    docker run -p 80:80 davioliveira-portfolio
# =============================================================================

# ---- Stage 1: Composer / PHP vendor ----
FROM php:8.3-cli-alpine AS vendor

RUN apk add --no-cache git unzip libzip-dev \
    && docker-php-ext-install zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY composer.json composer.lock ./
# Sem --classmap-authoritative aqui: classmap final é regenerado no stage app
# (depois de copiar app/, database/, etc.) com --classmap-authoritative.
RUN composer install \
        --no-interaction \
        --no-dev \
        --prefer-dist \
        --no-scripts \
        --no-autoloader

# ---- Stage 2: Node frontend (Vite build) ----
FROM node:20-alpine AS frontend

WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci

COPY vite.config.js tailwind.config.js postcss.config.js ./
COPY resources/ resources/
COPY public/ public/
RUN npm run build

# ---- Stage 3: Final runtime (nginx + php-fpm + supervisor) ----
FROM php:8.3-fpm-alpine AS app

# System dependencies + PHP extensions
RUN apk add --no-cache \
        nginx \
        supervisor \
        bash \
        sqlite \
        sqlite-dev \
        libzip-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        freetype-dev \
        oniguruma-dev \
        icu-dev \
        tzdata \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        zip \
        pdo \
        pdo_sqlite \
        bcmath \
        mbstring \
        intl \
        opcache \
    && rm -rf /var/cache/apk/*

# Composer (pra regenerar autoload com app/ presente)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configs
COPY docker/nginx/default.conf      /etc/nginx/http.d/default.conf
COPY docker/supervisor/supervisord.conf /etc/supervisord.conf
COPY docker/php/opcache.ini         /usr/local/etc/php/conf.d/opcache.ini
COPY docker/php/www.conf            /usr/local/etc/php-fpm.d/www.conf
COPY docker/entrypoint.sh           /usr/local/bin/entrypoint.sh

WORKDIR /var/www/html

# Application code
COPY . .
COPY --from=vendor   /app/vendor/        ./vendor/
COPY --from=frontend /app/public/build/  ./public/build/

# Build-time setup: dirs, autoload, package discovery.
# As otimizações de cache (config/route/view/event) e migrations rodam
# em runtime via entrypoint.sh (quando env vars de plataforma estão setadas).
RUN mkdir -p storage/framework/cache \
             storage/framework/sessions \
             storage/framework/views \
             storage/framework/testing \
             storage/logs \
             bootstrap/cache \
             /run/nginx \
    && touch storage/database.sqlite \
    && chown -R www-data:www-data /var/www/html/storage \
                                  /var/www/html/bootstrap/cache \
                                  /var/www/html/public/build \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && composer dump-autoload --optimize --classmap-authoritative --no-dev \
    && php artisan package:discover --ansi --no-interaction \
    && chmod +x /usr/local/bin/entrypoint.sh \
    && ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=20s --retries=3 \
    CMD wget -q -O- http://127.0.0.1/up || exit 1

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["supervisord", "-c", "/etc/supervisord.conf"]
