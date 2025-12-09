# EcoProyecto · Plataforma de Gestión de Ecografías

Aplicación web construida con Laravel 12 para centralizar el flujo operativo de **Ecografía Digital Machala**. Permite registrar pacientes, programar citas, descargar reportes y ofrecer una interfaz ligera para la recepción y personal administrativo.

## Tabla de contenido

1. [Tecnologías principales](#tecnologías-principales)
2. [Estructura del proyecto](#estructura-del-proyecto)
3. [Arquitectura funcional](#arquitectura-funcional)
4. [Módulos de negocio](#módulos-de-negocio)
5. [Modelos y base de datos](#modelos-y-base-de-datos)
6. [Rutas disponibles](#rutas-disponibles)
7. [Instalación y configuración](#instalación-y-configuración)
8. [Ejecución y scripts útiles](#ejecución-y-scripts-útiles)
9. [Front-end y assets](#front-end-y-assets)
10. [Reportes y exportaciones](#reportes-y-exportaciones)
11. [Pruebas y control de calidad](#pruebas-y-control-de-calidad)
12. [Limitaciones y siguiente trabajo](#limitaciones-y-siguiente-trabajo)

## Tecnologías principales

-   **Backend**: Laravel 12 (PHP 8.2) con Eloquent ORM y migraciones.
-   **Base de datos**: SQLite por defecto (`database/database.sqlite`), compatible con MySQL/PostgreSQL ajustando `.env`.
-   **Frontend**: Vistas Blade, Bootstrap 5.3, Bootstrap Icons y Google Fonts (Poppins).
-   **Bundler**: Vite 6 + Tailwind CSS plugin (pipeline listo, todavía no se usa Tailwind en producción).
-   **Reportes**: `barryvdh/laravel-dompdf` para PDF y streaming manual para CSV.
-   **Utilidades**: Axios preconfigurado para futuras peticiones AJAX (`resources/js/bootstrap.js`).

## Estructura del proyecto

| Ruta                             | Descripción                                                                                |
| -------------------------------- | ------------------------------------------------------------------------------------------ |
| `app/Http/Controllers`           | Controladores `PacienteController`, `CitaController` y `ReporteController`.                |
| `app/Models`                     | Modelos Eloquent `Pacientes` y `Cita`.                                                     |
| `database/migrations`            | Migraciones de `pacientes`, `citas` y tablas base de Laravel.                              |
| `resources/views/logica`         | Vistas personalizadas: `index`, `login`, `pacientes`, `citas`, `reportes` y plantilla PDF. |
| `public/css`, `public/img`       | Activos estáticos servidos directamente desde Laravel.                                     |
| `resources/css` y `resources/js` | Archivos fuente pensados para compilar con Vite.                                           |
| `routes/web.php`                 | Definición de todas las rutas (no se usa `routes/api.php`).                                |

## Arquitectura funcional

La aplicación ofrece navegación mediante una navbar común y páginas modulares:

-   **Inicio (`/`)**: landing informativa con contacto y horarios.
-   **Citas (`/citas`)**: agenda completa con tabla responsive, búsqueda manual (por ahora visual) y modales para crear/editar registros. Las validaciones se ejecutan en backend y se muestran como alertas + toasts.
-   **Pacientes (`/pacientes`)**: registro maestro de pacientes, también con modales de creación/edición y acciones in-line.
-   **Reportes (`/reportes`)**: accesos a descargas en PDF y CSV.
-   **Login (`/login`)**: pantalla estática utilizada solo como placeholder; no existe autenticación real.

Todos los formularios usan CSRF tokens, métodos HTTP simulados (`@method('PUT')`), y mensajes de sesión (`session('success')`) que se muestran en toasts fijados en la esquina inferior derecha.

## Módulos de negocio

### Gestión de pacientes

-   Implementado en `PacienteController`.
-   Validaciones estrictas (`$request->validate`) para nombres/apellidos, cédula única, email opcional, sexo con lista cerrada (`masculino`/`femenino`), tipos de ecografía predefinidos y precios numéricos.
-   Las vistas (`logica/pacientes.blade.php`) usan atributos `data-*` para poblar los formularios de edición mediante JS vanilla.

### Gestión de citas

-   Controlado por `CitaController`.
-   Campos: paciente, tipo de ecografía, fecha, hora, precio y estado (`pendiente`/`atendido`).
-   El listado usa `Cita::all()` y el modal de edición actualiza su `action` dinámicamente (`/citas/{id}`).
-   Validaciones implementadas solo en `store`; se recomienda replicarlas en `update`.

### Reportes

-   `ReporteController@index` sirve la vista `logica.reportes`.
-   `pacientesPdf()` carga `logica.reportes_pacientes_pdf` y genera el PDF a través de DomPDF.
-   `pacientesCsv()` crea un CSV en streaming, con cabeceras compatibles con Excel.
-   En `routes/web.php` existe la ruta `reportes.pacientes.excel`, pero aún no se implementa el método `pacientesExcel()`; hoy el botón “Excel” dispara el CSV.

### Autenticación

-   Solo existe la vista `logica/login.blade.php`. No están configurados guards, usuarios ni middleware; cualquier autenticación futura deberá construirse desde cero.

## Instalación y configuración

1. **Requisitos**

    - PHP 8.2+ con extensiones `ctype`, `curl`, `dom`, `fileinfo`, `mbstring`, `openssl`, `pdo_{driver}`, `tokenizer`.
    - Composer 2.6+.
    - Node.js 20+ / npm 10+.
    - Motor de base de datos (SQLite listo por defecto).

2. **Instalación**

    ```bash
    git clone <repo> EcoProyecto
    cd EcoProyecto
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    ```

3. **Base de datos**

    ```bash
    touch database/database.sqlite
    php artisan migrate
    ```

    Ajusta `.env` si deseas usar MySQL/PostgreSQL, y ejecuta nuevamente `php artisan migrate`.

4. **Datos de ejemplo**
    - No existen seeders, por lo que deberás usar los formularios o `php artisan tinker` para crear registros iniciales.

## Ejecución y scripts útiles

-   Servidor de desarrollo: `php artisan serve` (http://127.0.0.1:8000).
-   Vite (assets con HMR): `npm run dev`.
-   Workflow combinado (servidor + colas + logs + Vite): `composer run dev` (usa `npx concurrently`).
-   Compilación para producción: `npm run build`.

## Front-end y assets

-   Las vistas consumen Bootstrap y Bootstrap Icons desde CDN, además de `public/css/style.css`.
-   El pipeline de Vite apunta a `resources/css/app.css` y `resources/js/app.js`. Actualmente solo existe `resources/css/style.css`; crea `app.css` o ajusta `vite.config.js` si quieres incorporar Tailwind y assets versionados con `@vite`.
-   `public/img` contiene el logotipo referenciado por las vistas.

## Reportes y exportaciones

-   **PDF**: generado con DomPDF usando `logica.reportes_pacientes_pdf`. Personaliza esta vista para añadir cabeceras, filtros y branding.
-   **CSV**: `ReporteController@pacientesCsv` usa `fputcsv` y respuestas en streaming. Excel lo abre sin problemas porque se envían las cabeceras adecuadas.
-   **Excel (pendiente)**: la ruta está declarada pero falta implementar el método. Una opción es integrar `maatwebsite/excel` para producir `.xlsx`.

## Pruebas y control de calidad

-   PHPUnit está configurado (`php artisan test`) con el `ExampleTest` por defecto.
-   No existe cobertura automatizada para los controladores actuales. Se recomienda crear pruebas Feature para:
    -   Validaciones y flujos felices de pacientes/citas.
    -   Descarga de reportes (aserciones sobre cabeceras y contenido).
-   Para estilo de código, puedes añadir `./vendor/bin/pint` (Laravel Pint) a tu flujo de CI.

## Limitaciones y siguiente trabajo

-   Falta autenticación/autorización real.
-   Las citas no se relacionan con pacientes mediante claves foráneas.
-   No hay paginación (los listados usan `::all()`), lo cual afectará el rendimiento con grandes volúmenes.
-   El botón “Excel” descarga un CSV; documenta esto a usuarios finales o implementa el exportador real.
-   Tailwind y Vite aún no se aprovechan; la mayoría de estilos viven en archivos estáticos.
-   No hay seeders ni factories personalizados, lo que dificulta pruebas automatizadas.

---

Para proponer cambios o reportar incidencias, crea un issue interno describiendo módulo afectado, pasos para reproducir y solución propuesta. Con esta documentación deberías tener una vista 360° para mantener y evolucionar EcoProyecto. ¡Éxitos!
#   E c o D i g i t a l M a c h  
 