# Guía Rápida - EcoProyecto

## Referencia Rápida para Usuarios

---

## 🚀 Inicio Rápido

### Acceso al Sistema

1. Abre tu navegador web
2. Ingresa la URL del sistema
3. Navega usando el menú superior

---

## 👥 Gestión de Pacientes

### ➕ Agregar Paciente

```
1. Clic en "Pacientes" (menú superior)
2. Clic en "➕ Agregar Paciente"
3. Completa el formulario
4. Clic en "Guardar Paciente"
```

### ✏️ Editar Paciente

```
1. Localiza el paciente en la tabla
2. Clic en "✏️ Editar"
3. Modifica los datos
4. Clic en "Actualizar Paciente"
```

### 🗑️ Eliminar Paciente

```
1. Localiza el paciente en la tabla
2. Clic en "🗑️ Eliminar"
3. Confirma la eliminación
⚠️ ADVERTENCIA: Esta acción es permanente
```

### 📋 Campos Requeridos

-   ✅ Nombres
-   ✅ Apellidos
-   ✅ Cédula (única)
-   ✅ Teléfono
-   ✅ Sexo (Masculino/Femenino)
-   ✅ Fecha de Nacimiento
-   ✅ Tipo de Ecografía
-   ✅ Precio
-   ❌ Email (opcional)

### 🔍 Tipos de Ecografía Disponibles

-   Abdominal
-   Obstétrica
-   Mamaria
-   Tiroidea

---

## 📅 Gestión de Citas

### ➕ Agendar Cita

```
1. Clic en "Agendar Cita" (menú superior)
2. Clic en "➕ Agregar Cita"
3. Completa el formulario
4. Clic en "Guardar Cita"
```

### ✏️ Editar Cita

```
1. Localiza la cita en la tabla
2. Clic en "✏️ Editar"
3. Modifica los datos
4. Clic en "Actualizar Cita"
```

### 📋 Campos de Cita

-   ✅ Paciente (nombre completo)
-   ✅ Tipo de ecografía
-   ✅ Fecha
-   ✅ Hora
-   ✅ Precio
-   ✅ Estado (Pendiente/Atendido)

### 📊 Estados de Cita

-   🟡 **Pendiente**: Cita programada, no realizada
-   🟢 **Atendido**: Cita completada

---

## 📄 Reportes

### Generar Reporte PDF

```
1. Clic en "Reportes" (menú superior)
2. Clic en "📄 Descargar PDF"
3. El archivo se descarga automáticamente
```

### Generar Reporte CSV

```
1. Clic en "Reportes" (menú superior)
2. Clic en "📊 Descargar CSV"
3. Abre con Excel o Google Sheets
```

### 📊 Formatos Disponibles

| Formato | Uso Recomendado           |
| ------- | ------------------------- |
| **PDF** | Impresión, presentaciones |
| **CSV** | Excel, análisis de datos  |

> ⚠️ **NOTA**: El botón "Excel" actualmente descarga un CSV

---

## ⚡ Atajos de Teclado

| Acción            | Atajo                              |
| ----------------- | ---------------------------------- |
| Actualizar página | `F5` o `Ctrl+R`                    |
| Buscar en página  | `Ctrl+F` (Windows) / `Cmd+F` (Mac) |
| Cerrar modal      | `ESC`                              |
| Imprimir          | `Ctrl+P`                           |

---

## 🔧 Solución Rápida de Problemas

### ❌ Error: "El campo cédula ya ha sido tomado"

**Solución**: La cédula ya existe. Verifica si el paciente está registrado.

### ❌ Error: "El campo email ya ha sido tomado"

**Solución**: Usa otro email o déjalo vacío.

### ❌ Error: "El campo [nombre] es obligatorio"

**Solución**: Completa todos los campos marcados como requeridos.

### ❌ El sistema no carga

**Solución**:

1. Actualiza la página (F5)
2. Limpia la caché del navegador
3. Prueba con otro navegador

### ❌ El modal no se cierra

**Solución**:

1. Presiona `ESC`
2. Haz clic fuera del modal
3. Usa el botón "Cancelar"

### ❌ Los reportes no se descargan

**Solución**:

1. Verifica permisos de descarga
2. Revisa la carpeta de descargas
3. Desactiva bloqueadores de pop-ups

---

## 💡 Consejos Rápidos

### Gestión de Pacientes

-   ✅ Verifica la cédula antes de guardar
-   ✅ Registra el email cuando esté disponible
-   ✅ Revisa datos antes de eliminar
-   ✅ Usa Ctrl+F para buscar rápidamente

### Gestión de Citas

-   ✅ Verifica disponibilidad antes de agendar
-   ✅ Actualiza el estado después de atender
-   ✅ Incluye nombre completo del paciente
-   ✅ Respeta el horario de atención

### Reportes

-   ✅ Genera reportes regularmente
-   ✅ Organiza archivos por fecha
-   ✅ Usa CSV para análisis en Excel
-   ✅ Usa PDF para impresión

---

## 📞 Contacto Rápido

### Ecografía Digital Machala

-   📍 Buenavista y Boyacá
-   📞 0963947466
-   📧 ecografiadigitalmachala@gmail.com

### Horario de Atención

-   **Lunes a Viernes**: 8:00 AM - 6:00 PM
-   **Sábado**: 9:00 AM - 1:00 PM

---

## 🎯 Flujo de Trabajo Recomendado

### Proceso de Atención al Paciente

```
1. REGISTRO
   └─ Registrar nuevo paciente (si no existe)

2. AGENDAMIENTO
   └─ Crear cita con fecha y hora

3. ATENCIÓN
   └─ Realizar la ecografía

4. ACTUALIZACIÓN
   └─ Marcar cita como "Atendido"

5. REPORTE (opcional)
   └─ Generar reportes mensuales
```

---

## 📊 Validaciones Importantes

### Cédula

-   ✅ Debe ser única
-   ✅ Solo números
-   ✅ 10 dígitos

### Email

-   ✅ Debe ser único (si se proporciona)
-   ✅ Formato: usuario@dominio.com

### Precio

-   ✅ Solo números
-   ✅ Puede tener decimales (45.00)
-   ✅ Usa punto, no coma

### Fecha

-   ✅ Usa el selector de calendario
-   ✅ Formato: AAAA-MM-DD

---

## 🔐 Buenas Prácticas

### Seguridad de Datos

-   🔒 No compartas información de pacientes
-   🔒 Cierra sesión al terminar
-   🔒 Verifica datos antes de guardar
-   🔒 No elimines registros sin confirmar

### Mantenimiento

-   📅 Genera reportes semanalmente
-   📅 Revisa citas pendientes diariamente
-   📅 Actualiza estados de citas
-   📅 Limpia registros duplicados

### Eficiencia

-   ⚡ Usa atajos de teclado
-   ⚡ Mantén datos actualizados
-   ⚡ Organiza tus archivos de reportes
-   ⚡ Familiarízate con el sistema

---

## 📚 Recursos Adicionales

Para información detallada, consulta:

-   📖 **MANUAL_DE_USUARIO.md**: Manual completo del sistema
-   📖 **README.md**: Documentación técnica del proyecto

---

**Versión**: 1.0  
**Última Actualización**: Diciembre 2025

---

_Para soporte técnico, contacta al administrador del sistema_
