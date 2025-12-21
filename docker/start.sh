#!/bin/bash

set -e

echo "🚀 Iniciando aplicación Laravel..."

# 🧹 IMPORTANTE: Limpiar caché DE INMEDIATO antes de cualquier comando artisan
# Esto previene errores si hay referencias a dependencias de desarrollo (como Pail)
echo "🧹 Limpiando caché de bootstrap..."
rm -f /var/www/html/bootstrap/cache/*.php

# Esperar un momento para asegurar que todo esté listo
sleep 2

# Generar clave de aplicación si no existe
if [ -z "$APP_KEY" ]; then
    echo "📝 Generando APP_KEY..."
    php artisan key:generate --force
fi

# Limpiar caché artisan
echo "🧹 Limpiando caché de configuración..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Optimizar para producción
echo "⚡ Optimizando aplicación..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ejecutar migraciones
echo "🗄️ Ejecutando migraciones..."
php artisan migrate --force

# Crear enlace simbólico de storage si no existe
if [ ! -L /var/www/html/public/storage ]; then
    echo "🔗 Creando enlace simbólico de storage..."
    php artisan storage:link
fi

# Establecer permisos correctos
echo "🔐 Estableciendo permisos..."
chown -R laravel:www-data /var/www/html/storage
chown -R laravel:www-data /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache

echo "✅ Aplicación lista!"

# Iniciar supervisor
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
