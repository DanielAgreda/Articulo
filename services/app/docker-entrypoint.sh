#!/usr/bin/env bash
set -e

# Espera hasta que MySQL acepte conexiones
wait_for_db() {
  local host="${DB_HOST:-db}"
  local port="${DB_PORT:-3306}"
  local retries=30
  local count=0

  until mysqladmin ping -h"${host}" -P"${port}" --silent; do
    count=$((count+1))
    if [ "$count" -ge "$retries" ]; then
      echo "ERROR: no se pudo conectar a la base de datos en ${host}:${port}"
      exit 1
    fi
    echo "Esperando DB ${host}:${port}... (${count}/${retries})"
    sleep 2
  done
}

# Ejecuta comandos si no se han ejecutado antes
run_once() {
  local marker="$1"
  shift
  if [ ! -f "/var/www/html/storage/.${marker}_done" ]; then
    echo "Ejecutando tarea: ${marker}"
    "$@"
    touch "/var/www/html/storage/.${marker}_done"
  else
    echo "Omitiendo tarea ya ejecutada: ${marker}"
  fi
}

# MAIN
cd /var/www/html

# Si DB está configurada, esperar
if [ -n "${DB_HOST:-}" ]; then
  wait_for_db
fi

# Permisos
chown -R www-data:www-data storage bootstrap/cache || true
chmod -R 775 storage bootstrap/cache || true

# Composer install (solo si vendor no existe)
run_once composer_install bash -lc "composer install --no-interaction --optimize-autoloader --no-dev"

# Copiar .env ejemplo si no existe
if [ ! -f .env ] && [ -f .env.example ]; then
  cp .env.example .env
  echo ".env generado desde .env.example"
fi

# Generar APP_KEY solo si no existe
run_once app_key_generate bash -lc "php artisan key:generate --force"

# Migraciones y seeders (ejecutar siempre para idempotencia segura)
php artisan migrate --force

# Clear and cache (opcional y seguro)
php artisan config:cache || true
php artisan route:cache || true || true

# Lanzar el comando por defecto del contenedor (si fue sobrescrito)
if [ $# -gt 0 ]; then
  exec "$@"
else
  exec php-fpm
fi
