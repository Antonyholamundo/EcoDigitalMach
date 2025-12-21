# 🚀 Guía de Despliegue en Render

Esta guía te ayudará a desplegar tu proyecto Laravel EcoProyecto en Render usando Docker.

## 📋 Prerequisitos

1. Una cuenta en [Render](https://render.com)
2. Tu proyecto en un repositorio de Git (GitHub, GitLab, o Bitbucket)
3. Docker instalado localmente (opcional, para pruebas)

## 🔧 Archivos Creados

Se han creado los siguientes archivos para el despliegue:

-   **`Dockerfile`**: Configuración de Docker para producción
-   **`.dockerignore`**: Archivos a excluir del build de Docker
-   **`render.yaml`**: Configuración de Render (Blueprint)
-   **`docker-compose.yml`**: Para pruebas locales
-   **`docker/nginx/default.conf`**: Configuración de Nginx
-   **`docker/supervisor/supervisord.conf`**: Configuración de Supervisor
-   **`docker/start.sh`**: Script de inicio de la aplicación

## 🧪 Prueba Local (Opcional)

Antes de desplegar a Render, puedes probar localmente:

```bash
# Construir la imagen
docker-compose build

# Iniciar el contenedor
docker-compose up

# La aplicación estará disponible en http://localhost:8080
```

Para detener:

```bash
docker-compose down
```

## 📤 Pasos para Desplegar en Render

### Opción 1: Usando render.yaml (Recomendado)

1. **Sube tu código a Git**

    ```bash
    git add .
    git commit -m "Add Docker configuration for Render"
    git push origin main
    ```

2. **Conecta tu repositorio en Render**

    - Ve a [Render Dashboard](https://dashboard.render.com)
    - Haz clic en "New +" → "Blueprint"
    - Conecta tu repositorio de GitHub/GitLab/Bitbucket
    - Render detectará automáticamente el archivo `render.yaml`

3. **Configura las variables de entorno**

    - Render creará automáticamente la mayoría de las variables
    - **IMPORTANTE**: Después del primer despliegue, copia el valor de `APP_KEY` que se generó
    - Ve a Environment → `APP_KEY` y pega el valor para que sea persistente

4. **Despliega**
    - Haz clic en "Apply" para crear el servicio
    - Render construirá y desplegará tu aplicación automáticamente

### Opción 2: Despliegue Manual

1. **Sube tu código a Git**

    ```bash
    git add .
    git commit -m "Add Docker configuration for Render"
    git push origin main
    ```

2. **Crea un nuevo Web Service en Render**

    - Ve a [Render Dashboard](https://dashboard.render.com)
    - Haz clic en "New +" → "Web Service"
    - Conecta tu repositorio

3. **Configura el servicio**

    - **Name**: `ecoproyecto` (o el nombre que prefieras)
    - **Region**: Oregon (o la más cercana a tus usuarios)
    - **Branch**: `main`
    - **Runtime**: Docker
    - **Plan**: Free (o el que necesites)

4. **Configura las variables de entorno**

    Agrega las siguientes variables en la sección "Environment":

    ```
    APP_NAME=EcoProyecto
    APP_ENV=production
    APP_DEBUG=false
    APP_KEY=
    LOG_CHANNEL=stderr
    LOG_LEVEL=info
    DB_CONNECTION=sqlite
    SESSION_DRIVER=database
    CACHE_STORE=database
    QUEUE_CONNECTION=database
    FILESYSTEM_DISK=local
    ```

    **Nota**: Deja `APP_KEY` vacío por ahora, se generará automáticamente en el primer despliegue.

5. **Despliega**

    - Haz clic en "Create Web Service"
    - Render construirá y desplegará tu aplicación

6. **Obtén la APP_KEY generada**
    - Una vez desplegado, ve a "Logs"
    - Busca la línea que dice "Application key set successfully"
    - Copia el valor de APP_KEY
    - Ve a "Environment" y actualiza la variable APP_KEY con este valor
    - Guarda y redespliega

## 🔐 Variables de Entorno Importantes

### Variables Requeridas

-   `APP_KEY`: Se genera automáticamente, pero debe ser persistente
-   `APP_ENV`: Debe ser `production`
-   `APP_DEBUG`: Debe ser `false` en producción

### Variables de Base de Datos

El proyecto usa SQLite por defecto, que es perfecto para el plan gratuito de Render.

Si quieres usar PostgreSQL (recomendado para producción):

1. Crea una base de datos PostgreSQL en Render
2. Actualiza las variables de entorno:
    ```
    DB_CONNECTION=pgsql
    DB_HOST=[tu-host-de-render]
    DB_PORT=5432
    DB_DATABASE=[nombre-db]
    DB_USERNAME=[usuario]
    DB_PASSWORD=[contraseña]
    ```

## 📊 Monitoreo

Después del despliegue:

1. **Logs**: Ve a tu servicio → "Logs" para ver los logs en tiempo real
2. **Métricas**: Ve a "Metrics" para ver uso de CPU y memoria
3. **Health Check**: Render verificará automáticamente que tu app esté funcionando

## 🔄 Actualizaciones Automáticas

Con la configuración actual:

-   Cada push a la rama `main` desplegará automáticamente
-   Puedes desactivar esto en la configuración del servicio si lo prefieres

## ⚠️ Consideraciones Importantes

### Plan Gratuito de Render

-   El servicio se "duerme" después de 15 minutos de inactividad
-   La primera solicitud después de dormir tomará ~30 segundos
-   750 horas gratuitas por mes

### Almacenamiento

-   Los archivos subidos se perderán en cada despliegue
-   Para archivos persistentes, considera usar:
    -   Render Disks (de pago)
    -   S3 o servicios de almacenamiento externos

### Base de Datos

-   SQLite funciona pero los datos se pierden en cada despliegue
-   Para producción real, usa PostgreSQL de Render

## 🐛 Solución de Problemas

### Error: "APP_KEY not set"

-   Asegúrate de que la variable APP_KEY esté configurada
-   Redespliega el servicio

### Error 500

-   Revisa los logs en Render Dashboard
-   Verifica que todas las variables de entorno estén configuradas
-   Asegúrate de que las migraciones se ejecutaron correctamente

### La aplicación no carga

-   Verifica que el puerto 80 esté expuesto en el Dockerfile
-   Revisa los logs de Nginx y PHP-FPM

### Problemas con permisos

-   El script `start.sh` configura los permisos automáticamente
-   Si persisten, revisa los logs para más detalles

## 📚 Recursos Adicionales

-   [Documentación de Render](https://render.com/docs)
-   [Documentación de Laravel Deployment](https://laravel.com/docs/deployment)
-   [Docker Best Practices](https://docs.docker.com/develop/dev-best-practices/)

## 🎉 ¡Listo!

Tu aplicación Laravel debería estar ahora desplegada y accesible en la URL proporcionada por Render (algo como `https://ecoproyecto.onrender.com`).

¡Felicidades! 🎊
