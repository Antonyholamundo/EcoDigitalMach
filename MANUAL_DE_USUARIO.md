# Manual de Usuario - EcoProyecto

## Sistema de Gestión de Ecografías Digital Machala

---

## Tabla de Contenido

1. [Introducción](#introducción)
2. [Acceso al Sistema](#acceso-al-sistema)
3. [Navegación General](#navegación-general)
4. [Módulo de Inicio](#módulo-de-inicio)
5. [Gestión de Pacientes](#gestión-de-pacientes)
6. [Gestión de Citas](#gestión-de-citas)
7. [Generación de Reportes](#generación-de-reportes)
8. [Preguntas Frecuentes](#preguntas-frecuentes)
9. [Solución de Problemas](#solución-de-problemas)
10. [Glosario de Términos](#glosario-de-términos)

---

## Introducción

### ¿Qué es EcoProyecto?

**EcoProyecto** es una plataforma web diseñada específicamente para **Ecografía Digital Machala** que permite centralizar y optimizar el flujo operativo del centro médico. El sistema facilita:

-   ✅ Registro y gestión de pacientes
-   ✅ Programación y seguimiento de citas
-   ✅ Generación de reportes en PDF y CSV
-   ✅ Interfaz intuitiva para personal administrativo y de recepción

### Objetivo del Manual

Este manual está diseñado para guiar a los usuarios del sistema (personal administrativo, recepcionistas y personal médico) en el uso correcto de todas las funcionalidades disponibles.

### Requisitos del Sistema

Para utilizar EcoProyecto necesitas:

-   **Navegador web moderno**: Google Chrome, Mozilla Firefox, Microsoft Edge o Safari (versiones actualizadas)
-   **Conexión a internet**: Estable para acceder al sistema
-   **Resolución de pantalla**: Mínimo 1024x768 píxeles (recomendado 1920x1080)
-   **Permisos**: Acceso proporcionado por el administrador del sistema

---

## Acceso al Sistema

### Inicio de Sesión

> **Nota**: En la versión actual, el sistema no requiere autenticación. La pantalla de login es un placeholder para futuras versiones.

1. Abre tu navegador web
2. Ingresa la dirección URL del sistema (proporcionada por tu administrador)
    - Ejemplo local: `http://127.0.0.1:8000`
3. La página de inicio se cargará automáticamente

### Primera Vez en el Sistema

Si es tu primera vez usando el sistema:

1. Familiarízate con la barra de navegación superior
2. Explora cada módulo haciendo clic en las opciones del menú
3. Lee las secciones relevantes de este manual según tu rol

---

## Navegación General

### Barra de Navegación

La barra de navegación está presente en todas las páginas y contiene las siguientes opciones:

| Opción                       | Descripción                                 |
| ---------------------------- | ------------------------------------------- |
| **Logo + Ecografía Digital** | Regresa a la página de inicio               |
| **Inicio**                   | Página principal con información del centro |
| **Agendar Cita**             | Acceso al módulo de gestión de citas        |
| **Pacientes**                | Acceso al módulo de gestión de pacientes    |
| **Reportes**                 | Acceso a la generación de reportes          |
| **Opciones** (⚙️)            | Menú desplegable con configuración y salir  |

### Elementos Comunes de la Interfaz

#### Mensajes del Sistema

El sistema muestra mensajes en dos formatos:

1. **Alertas en la parte superior**: Aparecen después de realizar acciones importantes

    - 🟢 **Verde**: Operación exitosa
    - 🔴 **Rojo**: Error o validación fallida

2. **Toasts (notificaciones flotantes)**: Aparecen en la esquina inferior derecha
    - Se cierran automáticamente o haciendo clic en la "X"

#### Botones Principales

-   🔵 **Azul**: Acciones principales (Agregar, Guardar)
-   🟡 **Amarillo**: Editar información
-   🔴 **Rojo**: Eliminar registros
-   ⚪ **Gris**: Cancelar o cerrar

---

## Módulo de Inicio

### Descripción

La página de inicio es la landing page del sistema que proporciona información general sobre **Ecografía Digital Machala**.

### Contenido de la Página

#### Sección Hero

-   **Título principal**: "Bienvenido a Ecografía Digital Machala"
-   **Descripción**: Información sobre los servicios ofrecidos
-   **Imagen**: Fotografía representativa del centro médico

#### Información de Contacto (Footer)

**Contacto:**

-   📍 **Dirección**: Buenavista y Boyacá
-   📞 **Teléfono**: 0963947466
-   📧 **Email**: ecografiadigitalmachala@gmail.com

**Horario de Atención:**

-   **Lunes a Viernes**: 8:00 AM - 6:00 PM
-   **Sábado**: 9:00 AM - 1:00 PM

### Acciones Disponibles

Desde la página de inicio puedes:

-   Navegar a cualquier módulo usando la barra de navegación
-   Visualizar información de contacto y horarios

---

## Gestión de Pacientes

### Descripción General

El módulo de **Gestión de Pacientes** permite registrar, visualizar, editar y eliminar información de los pacientes del centro médico.

### Acceso al Módulo

1. Haz clic en **"Pacientes"** en la barra de navegación
2. Se mostrará la tabla con todos los pacientes registrados

### Visualización de Pacientes

#### Tabla de Pacientes

La tabla muestra la siguiente información:

| Columna                 | Descripción                      |
| ----------------------- | -------------------------------- |
| **Nombres**             | Nombres del paciente             |
| **Apellidos**           | Apellidos del paciente           |
| **Cédula**              | Número de identificación (único) |
| **Teléfono**            | Número de contacto               |
| **Email**               | Correo electrónico (opcional)    |
| **Sexo**                | Masculino o Femenino             |
| **Fecha de Nacimiento** | Fecha en formato AAAA-MM-DD      |
| **Tipo de Ecografía**   | Tipo de estudio solicitado       |
| **Precio**              | Costo del servicio               |
| **Acciones**            | Botones de Editar y Eliminar     |

#### Características de la Tabla

-   ✅ **Responsive**: Se adapta a diferentes tamaños de pantalla
-   ✅ **Ordenamiento visual**: Encabezados con fondo azul
-   ✅ **Mensaje cuando está vacía**: "No hay pacientes registrados"

### Agregar un Nuevo Paciente

#### Paso a Paso

1. **Haz clic** en el botón **"➕ Agregar Paciente"** (botón azul en la parte superior)

2. **Se abrirá un modal** (ventana emergente) con el formulario

3. **Completa todos los campos requeridos**:

    | Campo                   | Tipo      | Requerido | Descripción                                |
    | ----------------------- | --------- | --------- | ------------------------------------------ |
    | **Nombres**             | Texto     | ✅ Sí     | Nombres del paciente                       |
    | **Apellidos**           | Texto     | ✅ Sí     | Apellidos del paciente                     |
    | **Cédula**              | Texto     | ✅ Sí     | Número de cédula (debe ser único)          |
    | **Teléfono**            | Texto     | ✅ Sí     | Número de contacto                         |
    | **Email**               | Email     | ❌ No     | Correo electrónico                         |
    | **Sexo**                | Selección | ✅ Sí     | Masculino o Femenino                       |
    | **Fecha de Nacimiento** | Fecha     | ✅ Sí     | Selecciona del calendario                  |
    | **Tipo de Ecografía**   | Selección | ✅ Sí     | Abdominal, Obstétrica, Mamaria o Tiroidea  |
    | **Precio**              | Número    | ✅ Sí     | Costo en dólares (puede incluir decimales) |

4. **Haz clic** en **"Guardar Paciente"** (botón azul)

5. **Resultado**:
    - ✅ Si todo está correcto: Verás un mensaje de éxito y el paciente aparecerá en la tabla
    - ❌ Si hay errores: Se mostrará una alerta roja con los problemas detectados

#### Validaciones Importantes

-   🔒 **Cédula única**: No se pueden registrar dos pacientes con la misma cédula
-   🔒 **Email único**: Si proporcionas un email, debe ser único en el sistema
-   📧 **Formato de email**: Debe ser un correo válido (ejemplo@dominio.com)
-   💰 **Precio**: Debe ser un número positivo, puede tener hasta 2 decimales

#### Ejemplo de Registro

```
Nombres: María José
Apellidos: González Pérez
Cédula: 0705123456
Teléfono: 0987654321
Email: maria.gonzalez@email.com
Sexo: Femenino
Fecha de Nacimiento: 1990-05-15
Tipo de Ecografía: Obstétrica
Precio: 45.00
```

### Editar un Paciente Existente

#### Paso a Paso

1. **Localiza** el paciente en la tabla

2. **Haz clic** en el botón **"✏️ Editar"** (botón amarillo) en la columna de Acciones

3. **Se abrirá el modal de edición** con los datos actuales del paciente pre-cargados

4. **Modifica** los campos que necesites actualizar

5. **Haz clic** en **"Actualizar Paciente"** (botón amarillo)

6. **Resultado**:
    - ✅ Éxito: Mensaje de confirmación y datos actualizados en la tabla
    - ❌ Error: Alerta con los problemas detectados

#### Notas Importantes

-   📝 Todos los campos se pueden editar
-   🔒 Las mismas validaciones de registro aplican
-   ⚠️ Si cambias la cédula, asegúrate de que no exista en otro paciente

### Eliminar un Paciente

#### Paso a Paso

1. **Localiza** el paciente en la tabla

2. **Haz clic** en el botón **"🗑️ Eliminar"** (botón rojo) en la columna de Acciones

3. **Aparecerá una confirmación**: "¿Seguro que quieres eliminar este paciente?"

4. **Opciones**:

    - **Aceptar**: El paciente se eliminará permanentemente
    - **Cancelar**: No se realizará ninguna acción

5. **Resultado**:
    - ✅ El paciente desaparecerá de la tabla
    - 📢 Mensaje de confirmación

> ⚠️ **ADVERTENCIA**: Esta acción es **permanente** y no se puede deshacer. Asegúrate de eliminar el paciente correcto.

### Consejos y Mejores Prácticas

1. **Verifica los datos antes de guardar**: Revisa especialmente cédula y teléfono
2. **Usa el email cuando sea posible**: Facilita futuras comunicaciones
3. **Mantén actualizada la información**: Edita los datos cuando el paciente proporcione cambios
4. **Cuidado al eliminar**: Solo elimina registros duplicados o erróneos

---

## Gestión de Citas

### Descripción General

El módulo de **Gestión de Citas** permite programar, visualizar, editar y gestionar las citas de ecografías.

### Acceso al Módulo

1. Haz clic en **"Agendar Cita"** en la barra de navegación
2. Se mostrará la tabla con todas las citas programadas

### Visualización de Citas

#### Tabla de Citas

La tabla muestra la siguiente información:

| Columna      | Descripción                  |
| ------------ | ---------------------------- |
| **Paciente** | Nombre completo del paciente |
| **Tipo**     | Tipo de ecografía            |
| **Fecha**    | Fecha de la cita             |
| **Hora**     | Hora programada              |
| **Precio**   | Costo del servicio           |
| **Estado**   | Pendiente o Atendido         |
| **Acciones** | Botones de Editar y Eliminar |

### Agendar una Nueva Cita

#### Paso a Paso

1. **Haz clic** en el botón **"➕ Agregar Cita"** (botón azul)

2. **Se abrirá el modal** con el formulario de nueva cita

3. **Completa todos los campos**:

    | Campo        | Tipo      | Requerido | Descripción                                                  |
    | ------------ | --------- | --------- | ------------------------------------------------------------ |
    | **Paciente** | Texto     | ✅ Sí     | Nombre completo del paciente                                 |
    | **Tipo**     | Selección | ✅ Sí     | Tipo de ecografía (Abdominal, Obstétrica, Mamaria, Tiroidea) |
    | **Fecha**    | Fecha     | ✅ Sí     | Fecha de la cita                                             |
    | **Hora**     | Hora      | ✅ Sí     | Hora de la cita (formato 24h)                                |
    | **Precio**   | Número    | ✅ Sí     | Costo del servicio                                           |
    | **Estado**   | Selección | ✅ Sí     | Pendiente o Atendido                                         |

4. **Haz clic** en **"Guardar Cita"**

5. **Resultado**:
    - ✅ Cita creada exitosamente
    - 📢 Mensaje de confirmación

#### Ejemplo de Cita

```
Paciente: María José González Pérez
Tipo: Obstétrica
Fecha: 2025-12-15
Hora: 10:30
Precio: 45.00
Estado: Pendiente
```

### Editar una Cita

#### Paso a Paso

1. **Localiza** la cita en la tabla

2. **Haz clic** en el botón **"✏️ Editar"** (botón amarillo)

3. **Modifica** los campos necesarios en el modal

4. **Haz clic** en **"Actualizar Cita"**

#### Casos de Uso Comunes

-   **Reprogramar**: Cambiar fecha u hora
-   **Actualizar estado**: Marcar como "Atendido" después de la consulta
-   **Corregir información**: Modificar nombre del paciente o tipo de ecografía

### Eliminar una Cita

1. **Haz clic** en el botón **"🗑️ Eliminar"** (botón rojo)

2. **Confirma** la eliminación en el diálogo

3. **La cita se eliminará** permanentemente

> ⚠️ **NOTA**: Solo elimina citas canceladas o registradas por error.

### Estados de las Citas

#### Pendiente

-   🟡 Cita programada pero no realizada
-   Aparece cuando se crea una nueva cita
-   Indica que el paciente aún no ha sido atendido

#### Atendido

-   🟢 Cita completada
-   Cambia manualmente después de realizar la ecografía
-   Útil para reportes y seguimiento

### Consejos para Gestión de Citas

1. **Programa con anticipación**: Evita sobrecarga en la agenda
2. **Verifica disponibilidad**: Revisa la tabla antes de agendar
3. **Actualiza el estado**: Marca como "Atendido" después de cada consulta
4. **Incluye información completa**: Facilita la identificación del paciente
5. **Revisa horarios**: Respeta el horario de atención del centro

---

## Generación de Reportes

### Descripción General

El módulo de **Reportes** permite exportar la información de pacientes en diferentes formatos para análisis, respaldo o presentación.

### Acceso al Módulo

1. Haz clic en **"Reportes"** en la barra de navegación
2. Se mostrará la página con las opciones de exportación

### Tipos de Reportes Disponibles

#### 1. Reporte en PDF

**Características:**

-   📄 Formato: PDF (Portable Document Format)
-   🖨️ Ideal para: Impresión y presentaciones
-   📊 Contenido: Tabla formateada con todos los pacientes

**Cómo generar:**

1. En la página de Reportes, haz clic en el botón **"📄 Descargar PDF"**
2. El archivo se generará automáticamente
3. Tu navegador descargará el archivo `pacientes.pdf`
4. Abre el archivo con cualquier lector de PDF

**Información incluida:**

-   Nombres y apellidos
-   Cédula
-   Teléfono
-   Email
-   Sexo
-   Fecha de nacimiento
-   Tipo de ecografía
-   Precio

#### 2. Reporte en CSV

**Características:**

-   📊 Formato: CSV (Comma-Separated Values)
-   💻 Ideal para: Excel, análisis de datos, importación a otros sistemas
-   🔄 Compatible con: Microsoft Excel, Google Sheets, LibreOffice Calc

**Cómo generar:**

1. En la página de Reportes, haz clic en el botón **"📊 Descargar CSV"**
2. El archivo se descargará como `pacientes.csv`
3. Abre el archivo con Excel o cualquier hoja de cálculo

**Ventajas del CSV:**

-   ✅ Fácil de importar a otros sistemas
-   ✅ Permite análisis con fórmulas de Excel
-   ✅ Formato ligero y universal
-   ✅ Compatible con bases de datos

#### 3. Reporte en Excel

> ⚠️ **NOTA IMPORTANTE**: Actualmente, el botón "Excel" descarga un archivo CSV. La funcionalidad de exportación a formato `.xlsx` nativo está pendiente de implementación en futuras versiones.

**Alternativa actual:**

-   Descarga el archivo CSV
-   Abre con Microsoft Excel
-   Guarda como `.xlsx` si necesitas el formato Excel nativo

### Uso de los Reportes

#### Casos de Uso Comunes

1. **Respaldo de información**

    - Descarga periódica de reportes PDF o CSV
    - Almacenamiento en carpetas organizadas por fecha

2. **Análisis estadístico**

    - Exporta a CSV
    - Importa a Excel o Google Sheets
    - Crea gráficos y tablas dinámicas

3. **Presentaciones**

    - Genera PDF
    - Incluye en presentaciones o informes
    - Imprime para reuniones

4. **Auditorías**
    - Genera reportes mensuales
    - Documenta el crecimiento de pacientes
    - Verifica información registrada

### Consejos para Reportes

1. **Genera reportes regularmente**: Recomendado semanalmente o mensualmente
2. **Organiza tus archivos**: Crea carpetas por mes/año
3. **Nombra descriptivamente**: Ejemplo: `pacientes_diciembre_2025.pdf`
4. **Verifica antes de imprimir**: Revisa el PDF antes de enviar a impresión
5. **Usa CSV para análisis**: Más flexible que PDF para trabajar con datos

---

## Preguntas Frecuentes

### Generales

**P: ¿Necesito instalar algún programa para usar el sistema?**  
R: No, solo necesitas un navegador web moderno (Chrome, Firefox, Edge o Safari).

**P: ¿Puedo acceder desde mi celular o tablet?**  
R: Sí, el sistema es responsive y se adapta a diferentes dispositivos, aunque se recomienda usar una computadora para mejor experiencia.

**P: ¿Qué hago si olvido la URL del sistema?**  
R: Contacta al administrador del sistema o al departamento de IT de tu institución.

### Pacientes

**P: ¿Qué hago si intento registrar un paciente y me dice que la cédula ya existe?**  
R: Verifica que no hayas registrado al paciente anteriormente. Usa la tabla para buscar por cédula. Si es un error, edita el registro existente.

**P: ¿Puedo registrar un paciente sin email?**  
R: Sí, el email es opcional. Sin embargo, se recomienda registrarlo cuando esté disponible.

**P: ¿Cómo busco un paciente específico?**  
R: Actualmente, la búsqueda es manual (visual) en la tabla. Usa Ctrl+F (Cmd+F en Mac) en tu navegador para buscar rápidamente.

**P: ¿Puedo recuperar un paciente eliminado?**  
R: No, la eliminación es permanente. Ten mucho cuidado al eliminar registros.

### Citas

**P: ¿Puedo agendar varias citas para el mismo paciente?**  
R: Sí, no hay límite de citas por paciente.

**P: ¿El sistema me avisa si hay conflicto de horarios?**  
R: No, actualmente debes verificar manualmente la disponibilidad en la tabla de citas.

**P: ¿Cómo marco una cita como completada?**  
R: Edita la cita y cambia el estado de "Pendiente" a "Atendido".

**P: ¿Puedo ver solo las citas pendientes?**  
R: Actualmente no hay filtros automáticos. Revisa la columna "Estado" en la tabla.

### Reportes

**P: ¿Los reportes incluyen citas o solo pacientes?**  
R: Actualmente, los reportes solo incluyen información de pacientes. Los reportes de citas estarán disponibles en futuras versiones.

**P: ¿Puedo filtrar los reportes por fecha o tipo de ecografía?**  
R: No, los reportes actuales incluyen todos los pacientes registrados. Los filtros estarán disponibles en futuras versiones.

**P: ¿El PDF se puede editar?**  
R: No, el PDF es un documento de solo lectura. Si necesitas editar datos, usa el formato CSV.

**P: ¿Por qué el botón "Excel" descarga un CSV?**  
R: Es una funcionalidad pendiente. Puedes abrir el CSV con Excel y guardarlo como `.xlsx`.

---

## Solución de Problemas

### Problemas Comunes y Soluciones

#### El sistema no carga o se ve mal

**Síntomas:**

-   Página en blanco
-   Elementos desorganizados
-   Botones que no funcionan

**Soluciones:**

1. **Actualiza la página**: Presiona F5 o Ctrl+R (Cmd+R en Mac)
2. **Limpia la caché del navegador**:
    - Chrome: Ctrl+Shift+Delete → Selecciona "Imágenes y archivos en caché" → Borrar datos
    - Firefox: Ctrl+Shift+Delete → Selecciona "Caché" → Limpiar ahora
3. **Prueba con otro navegador**: Cambia a Chrome, Firefox o Edge
4. **Verifica tu conexión a internet**: Asegúrate de estar conectado

#### No puedo guardar un paciente o cita

**Síntomas:**

-   Mensaje de error en rojo
-   El formulario no se envía

**Soluciones:**

1. **Lee el mensaje de error**: Te indica qué campo tiene problemas
2. **Verifica campos requeridos**: Todos los campos marcados con \* deben estar completos
3. **Revisa el formato**:
    - Email: debe tener @ y dominio válido
    - Precio: solo números, usa punto para decimales (45.00)
    - Fecha: usa el selector de calendario
4. **Verifica unicidad**:
    - Cédula: no debe existir en otro paciente
    - Email: no debe estar duplicado

#### Los reportes no se descargan

**Síntomas:**

-   Hago clic pero no pasa nada
-   Error al generar el archivo

**Soluciones:**

1. **Verifica permisos de descarga**: Permite descargas en tu navegador
2. **Revisa la carpeta de descargas**: Puede haberse descargado automáticamente
3. **Desactiva bloqueadores de pop-ups**: Algunos bloquean las descargas
4. **Prueba con otro navegador**: Cambia temporalmente de navegador
5. **Contacta al administrador**: Si el problema persiste

#### El modal no se cierra o no se abre

**Síntomas:**

-   Hago clic en "Agregar" o "Editar" y no pasa nada
-   El modal se queda abierto

**Soluciones:**

1. **Presiona ESC**: Cierra el modal actual
2. **Haz clic fuera del modal**: En el área oscura alrededor
3. **Actualiza la página**: F5 o Ctrl+R
4. **Usa el botón "Cancelar"**: En la parte inferior del modal

### Mensajes de Error Comunes

| Mensaje                                                  | Significado                          | Solución                                                     |
| -------------------------------------------------------- | ------------------------------------ | ------------------------------------------------------------ |
| "El campo cédula ya ha sido tomado"                      | Ya existe un paciente con esa cédula | Verifica si el paciente ya está registrado o usa otra cédula |
| "El campo email ya ha sido tomado"                       | Ya existe un paciente con ese email  | Usa otro email o deja el campo vacío                         |
| "El campo [nombre] es obligatorio"                       | Falta completar un campo requerido   | Completa todos los campos marcados                           |
| "El campo email debe ser una dirección de correo válida" | Formato de email incorrecto          | Usa formato: usuario@dominio.com                             |
| "El campo precio debe ser un número"                     | Precio con formato incorrecto        | Usa solo números y punto decimal: 45.00                      |

### ¿Cuándo Contactar al Administrador?

Contacta al administrador del sistema si:

-   ❌ El sistema no carga después de varios intentos
-   ❌ Recibes errores técnicos (código 500, 404, etc.)
-   ❌ Necesitas recuperar información eliminada
-   ❌ Necesitas permisos especiales
-   ❌ Detectas información incorrecta que no puedes editar
-   ❌ El sistema está muy lento o no responde

---

## Glosario de Términos

### Términos del Sistema

**Cita**: Registro de una programación de ecografía para un paciente específico en una fecha y hora determinada.

**CSV (Comma-Separated Values)**: Formato de archivo que almacena datos en texto plano separados por comas, compatible con Excel y otras hojas de cálculo.

**Estado**: Condición actual de una cita (Pendiente o Atendido).

**Modal**: Ventana emergente que aparece sobre la página principal para mostrar formularios o información adicional.

**Paciente**: Persona registrada en el sistema que solicita o ha recibido servicios de ecografía.

**PDF (Portable Document Format)**: Formato de archivo para documentos que preserva el formato original y es ideal para impresión.

**Reporte**: Documento generado por el sistema que contiene información organizada de pacientes o citas.

**Toast**: Notificación pequeña que aparece temporalmente en la esquina de la pantalla para confirmar acciones.

**Validación**: Proceso automático que verifica que los datos ingresados cumplan con los requisitos del sistema.

### Términos Médicos

**Ecografía Abdominal**: Estudio por imágenes de los órganos del abdomen (hígado, riñones, vesícula, etc.).

**Ecografía Mamaria**: Estudio por imágenes de las glándulas mamarias.

**Ecografía Obstétrica**: Estudio por imágenes durante el embarazo para evaluar el desarrollo fetal.

**Ecografía Tiroidea**: Estudio por imágenes de la glándula tiroides.

### Términos Técnicos

**Navegador**: Programa que permite acceder a sitios web (Chrome, Firefox, Edge, Safari).

**Responsive**: Diseño que se adapta automáticamente a diferentes tamaños de pantalla.

**URL**: Dirección web del sistema (ejemplo: http://127.0.0.1:8000).

**Caché**: Almacenamiento temporal de datos en el navegador para cargar páginas más rápido.

---

## Información de Contacto y Soporte

### Soporte Técnico

Para asistencia técnica con el sistema:

-   📧 **Email**: [Configurar email de soporte]
-   📞 **Teléfono**: [Configurar número de soporte]
-   ⏰ **Horario de soporte**: Lunes a Viernes, 8:00 AM - 5:00 PM

### Información del Centro Médico

**Ecografía Digital Machala**

-   📍 **Dirección**: Buenavista y Boyacá
-   📞 **Teléfono**: 0963947466
-   📧 **Email**: ecografiadigitalmachala@gmail.com

**Horario de Atención:**

-   **Lunes a Viernes**: 8:00 AM - 6:00 PM
-   **Sábado**: 9:00 AM - 1:00 PM
-   **Domingo**: Cerrado

---

## Notas Finales

### Actualizaciones del Sistema

Este manual corresponde a la versión actual del sistema. Las futuras actualizaciones pueden incluir:

-   🔐 Sistema de autenticación y roles de usuario
-   🔍 Búsqueda y filtros avanzados
-   📊 Reportes de citas
-   📄 Exportación a Excel nativo (.xlsx)
-   📱 Aplicación móvil
-   🔗 Relación directa entre pacientes y citas
-   📄 Paginación para grandes volúmenes de datos

### Feedback y Sugerencias

Tu opinión es importante para mejorar el sistema. Si tienes sugerencias, comentarios o detectas problemas, por favor comunícalos al administrador del sistema.

---

**Versión del Manual**: 1.0  
**Fecha de Creación**: Diciembre 2025  
**Última Actualización**: Diciembre 2025

---

© 2025 Ecografía Digital Machala. Todos los derechos reservados.
