# 🔧 Configuración de PostgreSQL para Render

## 📝 Actualizar tu archivo .env local

Abre tu archivo `.env` y actualiza las siguientes líneas:

```env
# Cambiar de sqlite a pgsql
DB_CONNECTION=pgsql
DB_HOST=ep-empty-heart-adji88vi-pooler.c-2.us-east-1.aws.neon.tech
DB_PORT=5432
DB_DATABASE=neondb
DB_USERNAME=neondb_owner
DB_PASSWORD=npg_7numV2SfEzaO
DB_SSLMODE=require
```

## 🚀 Configuración para Render

Actualiza el archivo `render.yaml` con las variables de PostgreSQL, o configúralas manualmente en el Dashboard de Render:

### Variables de entorno para Render:

```
DB_CONNECTION=pgsql
DB_HOST=ep-empty-heart-adji88vi-pooler.c-2.us-east-1.aws.neon.tech
DB_PORT=5432
DB_DATABASE=neondb
DB_USERNAME=neondb_owner
DB_PASSWORD=npg_7numV2SfEzaO
DB_SSLMODE=require
```

## ⚠️ IMPORTANTE - Seguridad

**NUNCA** subas estas credenciales a Git. El archivo `.env` ya está en `.gitignore` por seguridad.

Para Render:

1. Configura las variables de entorno en el Dashboard de Render
2. O usa el archivo `render.yaml` actualizado (sin credenciales hardcodeadas)

## 📋 Pasos para actualizar tu .env local:

1. Abre el archivo `.env` en tu editor
2. Busca la sección de base de datos (líneas 23-28)
3. Reemplaza:

    ```env
    DB_CONNECTION=sqlite
    # DB_HOST=127.0.0.1
    # DB_PORT=3306
    # DB_DATABASE=laravel
    # DB_USERNAME=root
    # DB_PASSWORD=
    ```

    Por:

    ```env
    DB_CONNECTION=pgsql
    DB_HOST=ep-empty-heart-adji88vi-pooler.c-2.us-east-1.aws.neon.tech
    DB_PORT=5432
    DB_DATABASE=neondb
    DB_USERNAME=neondb_owner
    DB_PASSWORD=npg_7numV2SfEzaO
    DB_SSLMODE=require
    ```

4. Guarda el archivo

## 🧪 Probar la conexión

Después de actualizar el `.env`, prueba la conexión:

```bash
php artisan migrate:status
```

Si funciona, ejecuta las migraciones:

```bash
php artisan migrate
```
