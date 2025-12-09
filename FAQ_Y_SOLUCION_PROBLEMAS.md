# Preguntas Frecuentes y Solución de Problemas

## EcoProyecto - Guía de Soporte

---

## 📋 Tabla de Contenido

1. [Preguntas Frecuentes Generales](#preguntas-frecuentes-generales)
2. [Preguntas sobre Pacientes](#preguntas-sobre-pacientes)
3. [Preguntas sobre Citas](#preguntas-sobre-citas)
4. [Preguntas sobre Reportes](#preguntas-sobre-reportes)
5. [Problemas Técnicos Comunes](#problemas-técnicos-comunes)
6. [Mensajes de Error y Soluciones](#mensajes-de-error-y-soluciones)
7. [Validaciones del Sistema](#validaciones-del-sistema)
8. [Consejos y Mejores Prácticas](#consejos-y-mejores-prácticas)
9. [Cuándo Contactar Soporte](#cuándo-contactar-soporte)

---

## Preguntas Frecuentes Generales

### ¿Qué es EcoProyecto?

**Respuesta**: EcoProyecto es un sistema web de gestión diseñado específicamente para Ecografía Digital Machala. Permite:

-   Registrar y gestionar información de pacientes
-   Programar y dar seguimiento a citas de ecografías
-   Generar reportes en múltiples formatos
-   Centralizar el flujo operativo del centro médico

---

### ¿Necesito instalar algún programa para usar el sistema?

**Respuesta**: No, EcoProyecto es una aplicación web. Solo necesitas:

-   ✅ Un navegador web moderno (Chrome, Firefox, Edge o Safari)
-   ✅ Conexión a internet
-   ✅ La URL del sistema (proporcionada por tu administrador)

No requiere instalación de software adicional.

---

### ¿Puedo acceder desde mi celular o tablet?

**Respuesta**: Sí, el sistema es responsive y se adapta a diferentes dispositivos. Sin embargo:

-   ✅ **Recomendado**: Computadora de escritorio o laptop (mejor experiencia)
-   ⚠️ **Funcional**: Tablets (pantalla grande)
-   ⚠️ **Limitado**: Smartphones (pantalla pequeña puede dificultar la navegación)

Para tareas administrativas complejas, se recomienda usar una computadora.

---

### ¿Cómo inicio sesión en el sistema?

**Respuesta**: En la versión actual, el sistema **no requiere autenticación**. Simplemente:

1. Abre tu navegador
2. Ingresa la URL del sistema
3. La página de inicio se cargará automáticamente

> **Nota**: La pantalla de login visible es un placeholder para futuras versiones con autenticación.

---

### ¿Qué navegador es mejor para usar el sistema?

**Respuesta**: El sistema funciona en todos los navegadores modernos. Recomendaciones:

| Navegador             | Compatibilidad | Notas                          |
| --------------------- | -------------- | ------------------------------ |
| **Google Chrome**     | ⭐⭐⭐⭐⭐     | Recomendado, mejor rendimiento |
| **Mozilla Firefox**   | ⭐⭐⭐⭐⭐     | Excelente alternativa          |
| **Microsoft Edge**    | ⭐⭐⭐⭐⭐     | Muy bueno (basado en Chromium) |
| **Safari**            | ⭐⭐⭐⭐       | Bueno en Mac/iOS               |
| **Internet Explorer** | ❌             | No compatible                  |

**Importante**: Mantén tu navegador actualizado a la última versión.

---

### ¿Puedo usar el sistema sin conexión a internet?

**Respuesta**: No, EcoProyecto requiere conexión a internet constante porque:

-   Los datos se almacenan en un servidor central
-   Las actualizaciones se sincronizan en tiempo real
-   Los reportes se generan en el servidor

Asegúrate de tener una conexión estable para evitar pérdida de datos.

---

## Preguntas sobre Pacientes

### ¿Cómo busco un paciente específico?

**Respuesta**: Actualmente, la búsqueda es manual. Opciones:

**Método 1 - Búsqueda visual:**

-   Revisa la tabla de pacientes
-   Usa el scroll para navegar

**Método 2 - Búsqueda del navegador (Recomendado):**

1. Presiona `Ctrl+F` (Windows) o `Cmd+F` (Mac)
2. Escribe el nombre, cédula o dato que buscas
3. El navegador resaltará las coincidencias

> **Futuras versiones**: Incluirán barra de búsqueda integrada con filtros.

---

### ¿Qué hago si intento registrar un paciente y me dice que la cédula ya existe?

**Respuesta**: Este error indica que ya existe un paciente con esa cédula. Pasos a seguir:

1. **Verifica en la tabla**: Usa `Ctrl+F` para buscar la cédula
2. **Si encuentras el paciente**:
    - Es el mismo paciente → Usa el registro existente
    - Necesitas actualizar datos → Usa el botón "Editar"
3. **Si NO encuentras el paciente**:
    - Puede ser un error de tipeo → Verifica la cédula
    - Contacta al administrador si persiste el problema

**Recuerda**: Cada cédula debe ser única en el sistema.

---

### ¿Puedo registrar un paciente sin email?

**Respuesta**: Sí, el email es **opcional**. Sin embargo:

✅ **Ventajas de registrar el email:**

-   Facilita comunicaciones futuras
-   Permite envío de recordatorios (en futuras versiones)
-   Mejora la trazabilidad del paciente

⚠️ **Si proporcionas un email:**

-   Debe tener formato válido (usuario@dominio.com)
-   Debe ser único (no puede estar en otro paciente)

---

### ¿Puedo cambiar la cédula de un paciente?

**Respuesta**: Sí, puedes editar la cédula, pero:

⚠️ **Precauciones:**

-   Asegúrate de que sea realmente necesario
-   Verifica que la nueva cédula no exista en otro paciente
-   Confirma que la cédula es correcta antes de guardar

**Recomendación**: Solo cambia la cédula si fue registrada incorrectamente. Si es un paciente diferente, crea un nuevo registro.

---

### ¿Cómo elimino un paciente duplicado?

**Respuesta**: Pasos para eliminar duplicados:

1. **Identifica el registro correcto**: Verifica cuál tiene la información más completa
2. **Verifica citas asociadas**: Asegúrate de que no tenga citas importantes
3. **Elimina el duplicado**:
    - Haz clic en "🗑️ Eliminar" en el registro duplicado
    - Confirma la eliminación
4. **Actualiza el registro correcto**: Si es necesario, edita el registro que conservas

⚠️ **ADVERTENCIA**: La eliminación es permanente y no se puede deshacer.

---

### ¿Puedo recuperar un paciente eliminado?

**Respuesta**: **No**, la eliminación es permanente. El sistema no tiene papelera de reciclaje.

**Prevención:**

-   ✅ Verifica dos veces antes de eliminar
-   ✅ Confirma que es el paciente correcto
-   ✅ Genera reportes periódicos como respaldo
-   ✅ Solo elimina registros claramente duplicados o erróneos

**Si eliminaste por error:**

-   Contacta inmediatamente al administrador del sistema
-   Puede haber respaldos de la base de datos
-   Mientras más rápido reportes, más probable la recuperación

---

### ¿Qué tipos de ecografía puedo registrar?

**Respuesta**: El sistema tiene 4 tipos predefinidos:

| Tipo           | Descripción                      |
| -------------- | -------------------------------- |
| **Abdominal**  | Ecografía de órganos abdominales |
| **Obstétrica** | Ecografía de embarazo            |
| **Mamaria**    | Ecografía de glándulas mamarias  |
| **Tiroidea**   | Ecografía de glándula tiroides   |

**Si necesitas otro tipo:**

-   Contacta al administrador del sistema
-   Se puede agregar mediante configuración del código

---

## Preguntas sobre Citas

### ¿Puedo agendar varias citas para el mismo paciente?

**Respuesta**: **Sí**, no hay límite de citas por paciente. Puedes:

-   Agendar múltiples citas en diferentes fechas
-   Programar citas de seguimiento
-   Registrar diferentes tipos de ecografías

**Recomendación**: Usa el nombre completo del paciente para facilitar la identificación.

---

### ¿El sistema me avisa si hay conflicto de horarios?

**Respuesta**: **No**, actualmente el sistema no valida conflictos de horario automáticamente.

**Debes verificar manualmente:**

1. Revisa la tabla de citas antes de agendar
2. Busca la fecha y hora deseada
3. Asegúrate de que no haya otra cita en ese horario

**Recomendación**: Mantén un margen de al menos 30 minutos entre citas.

---

### ¿Cómo marco una cita como completada?

**Respuesta**: Pasos para actualizar el estado:

1. **Localiza la cita** en la tabla de citas
2. **Haz clic en "✏️ Editar"**
3. **Cambia el estado** de "Pendiente" a "Atendido"
4. **Haz clic en "Actualizar Cita"**

**Cuándo hacerlo:**

-   ✅ Inmediatamente después de realizar la ecografía
-   ✅ Al finalizar la consulta del paciente
-   ✅ Antes de cerrar el día laboral

---

### ¿Puedo ver solo las citas pendientes o solo las atendidas?

**Respuesta**: Actualmente **no hay filtros automáticos**. Alternativas:

**Método 1 - Revisión visual:**

-   Revisa la columna "Estado" en la tabla
-   🟡 Pendiente = Cita no realizada
-   🟢 Atendido = Cita completada

**Método 2 - Búsqueda del navegador:**

-   Presiona `Ctrl+F`
-   Busca "Pendiente" o "Atendido"
-   Navega entre resultados

> **Futuras versiones**: Incluirán filtros por estado, fecha y tipo.

---

### ¿Qué hago si un paciente cancela su cita?

**Respuesta**: Tienes dos opciones:

**Opción 1 - Eliminar la cita (Recomendado):**

1. Localiza la cita
2. Haz clic en "🗑️ Eliminar"
3. Confirma la eliminación

**Opción 2 - Mantener registro:**

1. Deja la cita con estado "Pendiente"
2. Agrega nota en el campo de observaciones (si existe)

**Recomendación**: Elimina citas canceladas para mantener la agenda limpia.

---

### ¿Puedo reprogramar una cita?

**Respuesta**: Sí, simplemente edita la cita:

1. Haz clic en "✏️ Editar"
2. Cambia la fecha y/u hora
3. Haz clic en "Actualizar Cita"

**Alternativa**: Si prefieres mantener historial:

1. Deja la cita original
2. Crea una nueva cita con la nueva fecha
3. Marca la original como "Atendido" o elimínala

---

## Preguntas sobre Reportes

### ¿Los reportes incluyen citas o solo pacientes?

**Respuesta**: Actualmente, los reportes **solo incluyen información de pacientes**:

-   Datos personales
-   Tipo de ecografía
-   Precio
-   Información de contacto

**No incluyen:**

-   ❌ Citas programadas
-   ❌ Historial de citas
-   ❌ Estados de citas

> **Futuras versiones**: Incluirán reportes de citas y análisis estadísticos.

---

### ¿Puedo filtrar los reportes por fecha o tipo de ecografía?

**Respuesta**: **No**, los reportes actuales incluyen **todos los pacientes** registrados sin filtros.

**Alternativa con CSV:**

1. Descarga el reporte CSV
2. Abre con Excel o Google Sheets
3. Usa las funciones de filtro de la hoja de cálculo
4. Filtra por tipo de ecografía, fecha, etc.

> **Futuras versiones**: Incluirán filtros integrados en el sistema.

---

### ¿Cuál es la diferencia entre PDF y CSV?

**Respuesta**: Cada formato tiene sus ventajas:

| Característica        | PDF                  | CSV                  |
| --------------------- | -------------------- | -------------------- |
| **Impresión**         | ⭐⭐⭐⭐⭐ Excelente | ⭐⭐ Regular         |
| **Edición**           | ❌ No editable       | ✅ Editable en Excel |
| **Análisis de datos** | ❌ Difícil           | ⭐⭐⭐⭐⭐ Excelente |
| **Presentaciones**    | ⭐⭐⭐⭐⭐ Ideal     | ⭐⭐ No recomendado  |
| **Tamaño de archivo** | Mediano              | Pequeño              |
| **Compatibilidad**    | Universal            | Universal            |

**Usa PDF para:**

-   Imprimir reportes
-   Presentaciones formales
-   Archivar documentos

**Usa CSV para:**

-   Análisis en Excel
-   Importar a otros sistemas
-   Crear gráficos y tablas dinámicas

---

### ¿Por qué el botón "Excel" descarga un CSV?

**Respuesta**: Es una funcionalidad **pendiente de implementación**.

**Situación actual:**

-   El botón "Excel" descarga un archivo CSV
-   El CSV es compatible con Excel
-   Puedes abrirlo con Excel sin problemas

**Solución temporal:**

1. Descarga el CSV
2. Abre con Microsoft Excel
3. Si necesitas formato `.xlsx`:
    - Archivo → Guardar como
    - Selecciona "Libro de Excel (.xlsx)"

> **Futuras versiones**: Exportarán directamente a formato `.xlsx` nativo.

---

### ¿Con qué frecuencia debo generar reportes?

**Respuesta**: Depende de tus necesidades, pero recomendamos:

**Respaldos regulares:**

-   📅 **Semanal**: Para centros pequeños
-   📅 **Diario**: Para centros con alto volumen
-   📅 **Mensual**: Para análisis y auditorías

**Casos especiales:**

-   Antes de actualizaciones del sistema
-   Después de jornadas intensivas
-   Para presentaciones o reuniones
-   Cuando lo requiera administración

**Organización:**

-   Crea carpetas por mes/año
-   Nombra archivos descriptivamente: `pacientes_diciembre_2025.pdf`
-   Mantén respaldos en la nube o disco externo

---

## Problemas Técnicos Comunes

### El sistema no carga o se ve mal

**Síntomas:**

-   Página en blanco
-   Elementos desorganizados
-   Botones que no funcionan
-   Estilos sin aplicar

**Soluciones:**

**1. Actualiza la página:**

```
Windows: F5 o Ctrl+R
Mac: Cmd+R
```

**2. Limpia la caché del navegador:**

**Chrome:**

1. Presiona `Ctrl+Shift+Delete`
2. Selecciona "Imágenes y archivos en caché"
3. Haz clic en "Borrar datos"

**Firefox:**

1. Presiona `Ctrl+Shift+Delete`
2. Selecciona "Caché"
3. Haz clic en "Limpiar ahora"

**Edge:**

1. Presiona `Ctrl+Shift+Delete`
2. Selecciona "Imágenes y archivos en caché"
3. Haz clic en "Borrar ahora"

**3. Prueba con otro navegador:**

-   Si usas Chrome, prueba Firefox
-   Si usas Firefox, prueba Chrome o Edge

**4. Verifica tu conexión:**

-   Asegúrate de estar conectado a internet
-   Prueba abrir otros sitios web
-   Reinicia tu router si es necesario

---

### No puedo guardar un paciente o cita

**Síntomas:**

-   Mensaje de error en rojo
-   El formulario no se envía
-   Los datos no aparecen en la tabla

**Soluciones:**

**1. Lee el mensaje de error:**

-   El sistema te indica qué campo tiene problemas
-   Busca el campo mencionado en el formulario

**2. Verifica campos requeridos:**

-   Todos los campos marcados deben estar completos
-   No dejes campos vacíos

**3. Revisa el formato de los datos:**

| Campo  | Formato Correcto              | Ejemplo         |
| ------ | ----------------------------- | --------------- |
| Email  | usuario@dominio.com           | maria@gmail.com |
| Precio | Números con punto decimal     | 45.00           |
| Fecha  | Usa el selector de calendario | 2025-12-15      |
| Cédula | Solo números                  | 0705123456      |

**4. Verifica unicidad:**

-   Cédula: No debe existir en otro paciente
-   Email: No debe estar duplicado

---

### Los reportes no se descargan

**Síntomas:**

-   Hago clic pero no pasa nada
-   Error al generar el archivo
-   El archivo no aparece en descargas

**Soluciones:**

**1. Verifica permisos de descarga:**

-   Permite descargas en tu navegador
-   Revisa si hay un ícono de bloqueo en la barra de direcciones

**2. Revisa la carpeta de descargas:**

-   El archivo puede haberse descargado automáticamente
-   Busca en `C:\Users\[TuUsuario]\Downloads`

**3. Desactiva bloqueadores:**

-   Desactiva temporalmente bloqueadores de pop-ups
-   Desactiva extensiones de seguridad

**4. Prueba con otro navegador:**

-   Cambia temporalmente de navegador
-   Verifica si el problema persiste

**5. Verifica espacio en disco:**

-   Asegúrate de tener espacio suficiente
-   Libera espacio si es necesario

---

### El modal no se cierra o no se abre

**Síntomas:**

-   Hago clic en "Agregar" o "Editar" y no pasa nada
-   El modal se queda abierto y no puedo cerrarlo
-   Aparece un fondo oscuro pero no el formulario

**Soluciones:**

**1. Presiona ESC:**

-   La tecla ESC cierra modales abiertos

**2. Haz clic fuera del modal:**

-   Haz clic en el área oscura alrededor del modal

**3. Usa el botón "Cancelar":**

-   Busca el botón "Cancelar" en la parte inferior del modal

**4. Actualiza la página:**

-   Presiona F5 o Ctrl+R
-   Perderás datos no guardados

**5. Verifica JavaScript:**

-   Asegúrate de que JavaScript esté habilitado en tu navegador

---

### La tabla no muestra todos los datos

**Síntomas:**

-   Faltan columnas
-   Los datos se ven cortados
-   La tabla se sale de la pantalla

**Soluciones:**

**1. Usa el scroll horizontal:**

-   Desplázate horizontalmente en la tabla
-   Usa la barra de scroll inferior

**2. Ajusta el zoom:**

-   Reduce el zoom del navegador: `Ctrl+-` (Windows) o `Cmd+-` (Mac)
-   Zoom recomendado: 90% - 100%

**3. Maximiza la ventana:**

-   Usa pantalla completa: F11
-   Maximiza la ventana del navegador

**4. Usa una pantalla más grande:**

-   Conecta un monitor externo
-   Usa una resolución mayor

---

## Mensajes de Error y Soluciones

### "El campo cédula ya ha sido tomado"

**Significado**: Ya existe un paciente con esa cédula en el sistema.

**Solución:**

1. Busca la cédula en la tabla de pacientes (`Ctrl+F`)
2. Si encuentras el paciente:
    - Usa el registro existente
    - Edita si necesitas actualizar datos
3. Si no lo encuentras:
    - Verifica que escribiste la cédula correctamente
    - Contacta al administrador si persiste

---

### "El campo email ya ha sido tomado"

**Significado**: Ya existe un paciente con ese email.

**Solución:**

1. Usa otro email
2. Deja el campo email vacío (es opcional)
3. Verifica si el paciente ya está registrado
4. Usa un email alternativo del paciente

---

### "El campo [nombre] es obligatorio"

**Significado**: Falta completar un campo requerido.

**Solución:**

1. Revisa el formulario completo
2. Busca campos vacíos
3. Completa todos los campos marcados como obligatorios
4. Intenta guardar nuevamente

**Campos obligatorios comunes:**

-   Nombres
-   Apellidos
-   Cédula
-   Teléfono
-   Sexo
-   Fecha de nacimiento
-   Tipo de ecografía
-   Precio

---

### "El campo email debe ser una dirección de correo válida"

**Significado**: El formato del email es incorrecto.

**Solución:**

1. Verifica el formato: `usuario@dominio.com`
2. Asegúrate de incluir:
    - Nombre de usuario
    - Símbolo @
    - Dominio válido (.com, .ec, .org, etc.)

**Ejemplos correctos:**

-   ✅ maria.gonzalez@gmail.com
-   ✅ juan_perez@hotmail.com
-   ✅ info@ecografia.ec

**Ejemplos incorrectos:**

-   ❌ mariagmail.com (falta @)
-   ❌ maria@gmail (falta extensión)
-   ❌ @gmail.com (falta usuario)

---

### "El campo precio debe ser un número"

**Significado**: El precio tiene un formato incorrecto.

**Solución:**

1. Usa solo números
2. Usa punto (.) para decimales, no coma (,)
3. No uses símbolos de moneda ($)
4. No uses separadores de miles

**Ejemplos correctos:**

-   ✅ 45
-   ✅ 45.00
-   ✅ 45.50

**Ejemplos incorrectos:**

-   ❌ $45
-   ❌ 45,00
-   ❌ 1,000.00
-   ❌ cuarenta y cinco

---

### "Error 404 - Página no encontrada"

**Significado**: La URL es incorrecta o la página no existe.

**Solución:**

1. Verifica la URL en la barra de direcciones
2. Regresa a la página de inicio
3. Usa el menú de navegación
4. Contacta al administrador si persiste

---

### "Error 500 - Error interno del servidor"

**Significado**: Problema en el servidor del sistema.

**Solución:**

1. Actualiza la página (F5)
2. Espera unos minutos e intenta nuevamente
3. Verifica tu conexión a internet
4. **Contacta al administrador inmediatamente**

> ⚠️ Este error requiere atención técnica.

---

## Validaciones del Sistema

### Validaciones de Pacientes

| Campo               | Validación                    | Mensaje de Error                                         |
| ------------------- | ----------------------------- | -------------------------------------------------------- |
| Nombres             | Requerido                     | "El campo nombres es obligatorio"                        |
| Apellidos           | Requerido                     | "El campo apellidos es obligatorio"                      |
| Cédula              | Requerido, único              | "El campo cédula ya ha sido tomado"                      |
| Teléfono            | Requerido                     | "El campo teléfono es obligatorio"                       |
| Email               | Formato válido, único         | "El campo email debe ser una dirección de correo válida" |
| Sexo                | Requerido, masculino/femenino | "El campo sexo es obligatorio"                           |
| Fecha de nacimiento | Requerido, formato fecha      | "El campo fecha de nacimiento es obligatorio"            |
| Tipo de ecografía   | Requerido, lista cerrada      | "El campo tipo de ecografía es obligatorio"              |
| Precio              | Requerido, numérico           | "El campo precio debe ser un número"                     |

### Validaciones de Citas

| Campo    | Validación                    | Mensaje de Error                     |
| -------- | ----------------------------- | ------------------------------------ |
| Paciente | Requerido                     | "El campo paciente es obligatorio"   |
| Tipo     | Requerido                     | "El campo tipo es obligatorio"       |
| Fecha    | Requerido, formato fecha      | "El campo fecha es obligatorio"      |
| Hora     | Requerido, formato hora       | "El campo hora es obligatorio"       |
| Precio   | Requerido, numérico           | "El campo precio debe ser un número" |
| Estado   | Requerido, pendiente/atendido | "El campo estado es obligatorio"     |

---

## Consejos y Mejores Prácticas

### Para Evitar Errores

1. ✅ **Verifica antes de guardar**: Revisa todos los datos
2. ✅ **Usa copiar/pegar**: Para cédulas y emails largos
3. ✅ **Completa todos los campos**: No dejes campos requeridos vacíos
4. ✅ **Usa el selector de fecha**: No escribas fechas manualmente
5. ✅ **Confirma antes de eliminar**: La eliminación es permanente

### Para Trabajar Eficientemente

1. ⚡ **Usa atajos de teclado**: `Ctrl+F` para buscar
2. ⚡ **Mantén pestañas organizadas**: Una pestaña por módulo
3. ⚡ **Actualiza regularmente**: Presiona F5 para ver cambios recientes
4. ⚡ **Genera reportes periódicos**: Respaldos semanales
5. ⚡ **Cierra modales después de usar**: Presiona ESC

### Para Mantener Datos Limpios

1. 🧹 **Elimina duplicados**: Revisa y limpia registros duplicados
2. 🧹 **Actualiza información**: Mantén datos de contacto actualizados
3. 🧹 **Marca citas atendidas**: Actualiza estados después de cada consulta
4. 🧹 **Verifica cédulas**: Confirma que sean correctas antes de guardar
5. 🧹 **Usa formatos consistentes**: Nombres en mayúsculas, teléfonos sin guiones

---

## Cuándo Contactar Soporte

### Contacta al Administrador si:

❌ **Problemas Técnicos:**

-   El sistema no carga después de varios intentos
-   Recibes errores 500 o errores técnicos
-   Los reportes no se generan
-   El sistema está muy lento

❌ **Problemas de Datos:**

-   Necesitas recuperar información eliminada
-   Detectas datos incorrectos que no puedes editar
-   Necesitas agregar nuevos tipos de ecografía
-   Requieres acceso a funciones especiales

❌ **Problemas de Configuración:**

-   Necesitas cambiar la URL del sistema
-   Requieres permisos especiales
-   Necesitas configurar respaldos automáticos
-   Quieres personalizar el sistema

### Información para Proporcionar al Soporte:

Cuando contactes soporte, incluye:

1. **Descripción del problema**: Qué estabas haciendo cuando ocurrió
2. **Mensaje de error**: Copia exacta del mensaje (captura de pantalla)
3. **Navegador y versión**: Chrome 120, Firefox 121, etc.
4. **Pasos para reproducir**: Cómo hacer que el error ocurra nuevamente
5. **Hora del incidente**: Fecha y hora aproximada
6. **Tu información**: Nombre, rol, ubicación

---

## Contacto de Soporte

### Soporte Técnico del Sistema

-   📧 **Email**: [Configurar email de soporte]
-   📞 **Teléfono**: [Configurar número de soporte]
-   ⏰ **Horario**: Lunes a Viernes, 8:00 AM - 5:00 PM

### Ecografía Digital Machala

-   📍 **Dirección**: Buenavista y Boyacá
-   📞 **Teléfono**: 0963947466
-   📧 **Email**: ecografiadigitalmachala@gmail.com

---

**Versión**: 1.0  
**Última Actualización**: Diciembre 2025

---

© 2025 Ecografía Digital Machala. Todos los derechos reservados.
