#!/bin/sh
# Entrypoint executado no boot do container — quando as env vars
# da plataforma (Render, Fly, Railway, etc.) já estão disponíveis.
# As otimizações Laravel são feitas aqui em vez de no `docker build`
# para que o cache reflita o ambiente real, não o ambiente de build.

set -e

cd /var/www/html

# Permissões (caso volume montado tenha owner diferente)
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

# Garante que o SQLite existe (idempotente). Em plataformas com volume
# persistente, o arquivo já existe; em deploys sem volume, criamos vazio.
if [ ! -f storage/database.sqlite ]; then
    touch storage/database.sqlite
    chown www-data:www-data storage/database.sqlite
fi

# Limpa caches antigos (do build) antes de regenerar com env de runtime
php artisan config:clear --no-interaction || true
php artisan route:clear  --no-interaction || true
php artisan view:clear   --no-interaction || true
php artisan event:clear  --no-interaction || true

# Migrations idempotentes (no-op se já aplicadas)
php artisan migrate --force --no-interaction || true

# storage:link idempotente
php artisan storage:link --no-interaction || true

# Caches com env de runtime
php artisan config:cache --no-interaction
php artisan route:cache  --no-interaction
php artisan view:cache   --no-interaction
php artisan event:cache  --no-interaction

# Inicia supervisord (php-fpm + nginx)
exec "$@"
