# Diagramas de Flujo - EcoProyecto

## Procesos y Flujos de Trabajo del Sistema

---

## 📋 Tabla de Contenido

1. [Flujo General del Sistema](#flujo-general-del-sistema)
2. [Flujo de Gestión de Pacientes](#flujo-de-gestión-de-pacientes)
3. [Flujo de Gestión de Citas](#flujo-de-gestión-de-citas)
4. [Flujo de Generación de Reportes](#flujo-de-generación-de-reportes)
5. [Flujo de Atención al Paciente](#flujo-de-atención-al-paciente)

---

## Flujo General del Sistema

```mermaid
graph TD
    A[Inicio - Acceso al Sistema] --> B{¿Qué deseas hacer?}
    B -->|Gestionar Pacientes| C[Módulo de Pacientes]
    B -->|Gestionar Citas| D[Módulo de Citas]
    B -->|Generar Reportes| E[Módulo de Reportes]
    B -->|Ver Información| F[Página de Inicio]

    C --> C1[Ver Lista de Pacientes]
    C --> C2[Agregar Paciente]
    C --> C3[Editar Paciente]
    C --> C4[Eliminar Paciente]

    D --> D1[Ver Lista de Citas]
    D --> D2[Agendar Cita]
    D --> D3[Editar Cita]
    D --> D4[Eliminar Cita]

    E --> E1[Generar PDF]
    E --> E2[Generar CSV]
    E --> E3[Generar Excel]

    F --> F1[Ver Información del Centro]
    F --> F2[Ver Horarios]
    F --> F3[Ver Contacto]
```

---

## Flujo de Gestión de Pacientes

### Agregar Nuevo Paciente

```mermaid
flowchart TD
    Start([Usuario accede a Pacientes]) --> Click1[Clic en 'Agregar Paciente']
    Click1 --> Modal1[Se abre modal de registro]
    Modal1 --> Fill[Usuario completa formulario]
    Fill --> Validate{¿Datos válidos?}

    Validate -->|No| Error1[Mostrar errores]
    Error1 --> Fill

    Validate -->|Sí| Check{¿Cédula única?}
    Check -->|No| Error2[Error: Cédula duplicada]
    Error2 --> Fill

    Check -->|Sí| CheckEmail{¿Email proporcionado?}
    CheckEmail -->|Sí| ValidateEmail{¿Email único?}
    CheckEmail -->|No| Save[Guardar paciente]

    ValidateEmail -->|No| Error3[Error: Email duplicado]
    Error3 --> Fill
    ValidateEmail -->|Sí| Save

    Save --> Success[Mostrar mensaje de éxito]
    Success --> Refresh[Actualizar tabla]
    Refresh --> End([Paciente registrado])
```

### Editar Paciente Existente

```mermaid
flowchart TD
    Start([Usuario localiza paciente]) --> Click[Clic en 'Editar']
    Click --> Modal[Se abre modal con datos]
    Modal --> Modify[Usuario modifica campos]
    Modify --> Submit[Clic en 'Actualizar']
    Submit --> Validate{¿Datos válidos?}

    Validate -->|No| Error[Mostrar errores]
    Error --> Modify

    Validate -->|Sí| Update[Actualizar en base de datos]
    Update --> Success[Mensaje de éxito]
    Success --> Refresh[Actualizar tabla]
    Refresh --> End([Paciente actualizado])
```

### Eliminar Paciente

```mermaid
flowchart TD
    Start([Usuario localiza paciente]) --> Click[Clic en 'Eliminar']
    Click --> Confirm{¿Confirma eliminación?}

    Confirm -->|No| Cancel([Cancelar - No se elimina])
    Confirm -->|Sí| Delete[Eliminar de base de datos]
    Delete --> Success[Mensaje de confirmación]
    Success --> Refresh[Actualizar tabla]
    Refresh --> End([Paciente eliminado])
```

---

## Flujo de Gestión de Citas

### Agendar Nueva Cita

```mermaid
flowchart TD
    Start([Usuario accede a Citas]) --> Click[Clic en 'Agregar Cita']
    Click --> Modal[Se abre modal de cita]
    Modal --> Fill[Usuario completa formulario]

    Fill --> FillPatient[Ingresar nombre del paciente]
    FillPatient --> FillType[Seleccionar tipo de ecografía]
    FillType --> FillDate[Seleccionar fecha]
    FillDate --> FillTime[Seleccionar hora]
    FillTime --> FillPrice[Ingresar precio]
    FillPrice --> FillStatus[Seleccionar estado]

    FillStatus --> Submit[Clic en 'Guardar Cita']
    Submit --> Validate{¿Datos completos?}

    Validate -->|No| Error[Mostrar errores]
    Error --> Fill

    Validate -->|Sí| Save[Guardar cita]
    Save --> Success[Mensaje de éxito]
    Success --> Refresh[Actualizar tabla]
    Refresh --> End([Cita agendada])
```

### Actualizar Estado de Cita

```mermaid
flowchart TD
    Start([Paciente atendido]) --> Locate[Localizar cita en tabla]
    Locate --> Click[Clic en 'Editar']
    Click --> Modal[Se abre modal]
    Modal --> Change[Cambiar estado a 'Atendido']
    Change --> Submit[Clic en 'Actualizar']
    Submit --> Update[Actualizar en base de datos]
    Update --> Success[Mensaje de éxito]
    Success --> Refresh[Actualizar tabla]
    Refresh --> End([Estado actualizado])
```

---

## Flujo de Generación de Reportes

### Generar Reporte PDF

```mermaid
flowchart TD
    Start([Usuario accede a Reportes]) --> Click[Clic en 'Descargar PDF']
    Click --> Query[Sistema consulta pacientes]
    Query --> Generate[Generar documento PDF]
    Generate --> Format[Aplicar formato y estilos]
    Format --> Download[Descargar archivo]
    Download --> Open{¿Abrir archivo?}

    Open -->|Sí| View[Abrir con lector PDF]
    Open -->|No| Save[Guardar en descargas]

    View --> End([Reporte generado])
    Save --> End
```

### Generar Reporte CSV

```mermaid
flowchart TD
    Start([Usuario accede a Reportes]) --> Click[Clic en 'Descargar CSV']
    Click --> Query[Sistema consulta pacientes]
    Query --> Generate[Generar archivo CSV]
    Generate --> Headers[Agregar encabezados]
    Headers --> Data[Agregar datos de pacientes]
    Data --> Download[Descargar archivo]
    Download --> Open{¿Abrir con Excel?}

    Open -->|Sí| Excel[Abrir en Excel/Sheets]
    Open -->|No| Save[Guardar en descargas]

    Excel --> Analyze[Analizar datos]
    Analyze --> End([Reporte generado])
    Save --> End
```

---

## Flujo de Atención al Paciente

### Proceso Completo de Atención

```mermaid
flowchart TD
    Start([Paciente llega al centro]) --> Check{¿Paciente registrado?}

    Check -->|No| Register[Registrar nuevo paciente]
    Register --> RegisterForm[Completar formulario]
    RegisterForm --> SavePatient[Guardar paciente]
    SavePatient --> Schedule

    Check -->|Sí| Schedule[Agendar cita]

    Schedule --> ScheduleForm[Completar formulario de cita]
    ScheduleForm --> SelectDate[Seleccionar fecha y hora]
    SelectDate --> SelectType[Seleccionar tipo de ecografía]
    SelectType --> SetPrice[Establecer precio]
    SetPrice --> SaveAppointment[Guardar cita como 'Pendiente']

    SaveAppointment --> Wait[Esperar día de la cita]
    Wait --> Arrive[Paciente llega para cita]
    Arrive --> Perform[Realizar ecografía]
    Perform --> Complete[Completar atención]
    Complete --> UpdateStatus[Actualizar estado a 'Atendido']
    UpdateStatus --> End([Proceso completado])
```

### Flujo de Trabajo Diario del Personal

```mermaid
flowchart TD
    Start([Inicio del día]) --> Login[Acceder al sistema]
    Login --> CheckToday[Revisar citas del día]
    CheckToday --> Pending{¿Hay citas pendientes?}

    Pending -->|Sí| Prepare[Preparar para atención]
    Pending -->|No| NewPatients[Atender nuevos pacientes]

    Prepare --> Attend[Atender paciente]
    Attend --> UpdateCita[Marcar como 'Atendido']
    UpdateCita --> CheckMore{¿Más citas?}

    CheckMore -->|Sí| Prepare
    CheckMore -->|No| NewPatients

    NewPatients --> RegisterNew{¿Nuevo paciente?}
    RegisterNew -->|Sí| AddPatient[Registrar paciente]
    AddPatient --> ScheduleNew[Agendar cita]
    ScheduleNew --> CheckEnd

    RegisterNew -->|No| CheckEnd{¿Fin del día?}
    CheckEnd -->|No| CheckToday
    CheckEnd -->|Sí| GenerateReport[Generar reporte del día]
    GenerateReport --> End([Fin del día])
```

---

## Diagrama de Estados de Cita

```mermaid
stateDiagram-v2
    [*] --> Pendiente: Cita creada
    Pendiente --> Atendido: Paciente atendido
    Pendiente --> [*]: Cita eliminada
    Atendido --> [*]: Cita eliminada

    note right of Pendiente
        Estado inicial
        Cita programada
    end note

    note right of Atendido
        Estado final
        Ecografía realizada
    end note
```

---

## Diagrama de Validaciones

### Validación de Datos de Paciente

```mermaid
flowchart TD
    Start([Datos ingresados]) --> V1{¿Nombres completos?}
    V1 -->|No| E1[Error: Campo requerido]
    V1 -->|Sí| V2{¿Cédula válida?}

    V2 -->|No| E2[Error: Cédula inválida]
    V2 -->|Sí| V3{¿Cédula única?}

    V3 -->|No| E3[Error: Cédula duplicada]
    V3 -->|Sí| V4{¿Email proporcionado?}

    V4 -->|No| V7
    V4 -->|Sí| V5{¿Email válido?}

    V5 -->|No| E4[Error: Email inválido]
    V5 -->|Sí| V6{¿Email único?}

    V6 -->|No| E5[Error: Email duplicado]
    V6 -->|Sí| V7{¿Precio válido?}

    V7 -->|No| E6[Error: Precio inválido]
    V7 -->|Sí| Success([Validación exitosa])

    E1 --> End([Mostrar errores])
    E2 --> End
    E3 --> End
    E4 --> End
    E5 --> End
    E6 --> End
```

---

## Casos de Uso Principales

### Caso de Uso: Registro de Paciente

```mermaid
graph LR
    A[Recepcionista] -->|Registra| B[Nuevo Paciente]
    B -->|Completa| C[Formulario]
    C -->|Valida| D[Sistema]
    D -->|Guarda| E[Base de Datos]
    E -->|Confirma| A
```

### Caso de Uso: Agendamiento de Cita

```mermaid
graph LR
    A[Recepcionista] -->|Agenda| B[Cita]
    B -->|Para| C[Paciente]
    C -->|En fecha| D[Calendario]
    D -->|Valida| E[Sistema]
    E -->|Confirma| A
```

### Caso de Uso: Generación de Reportes

```mermaid
graph LR
    A[Administrador] -->|Solicita| B[Reporte]
    B -->|Consulta| C[Base de Datos]
    C -->|Genera| D[Documento]
    D -->|Descarga| A
```

---

## Arquitectura de Navegación

```mermaid
graph TD
    Home[Página de Inicio] --> Nav[Barra de Navegación]

    Nav --> Patients[Módulo Pacientes]
    Nav --> Appointments[Módulo Citas]
    Nav --> Reports[Módulo Reportes]
    Nav --> Options[Opciones]

    Patients --> PList[Lista de Pacientes]
    Patients --> PAdd[Agregar Paciente]
    Patients --> PEdit[Editar Paciente]
    Patients --> PDelete[Eliminar Paciente]

    Appointments --> AList[Lista de Citas]
    Appointments --> AAdd[Agendar Cita]
    Appointments --> AEdit[Editar Cita]
    Appointments --> ADelete[Eliminar Cita]

    Reports --> RPDF[Reporte PDF]
    Reports --> RCSV[Reporte CSV]
    Reports --> RExcel[Reporte Excel]

    Options --> Config[Configuración]
    Options --> Logout[Salir]
```

---

## Flujo de Datos

```mermaid
flowchart LR
    User[Usuario] -->|Ingresa datos| Form[Formulario]
    Form -->|Envía| Controller[Controlador]
    Controller -->|Valida| Validation[Validación]
    Validation -->|OK| Model[Modelo]
    Validation -->|Error| Form
    Model -->|Guarda| DB[(Base de Datos)]
    DB -->|Confirma| Model
    Model -->|Responde| Controller
    Controller -->|Muestra| View[Vista]
    View -->|Actualiza| User
```

---

## Mejores Prácticas - Flujo de Trabajo

### Rutina Diaria Recomendada

```mermaid
gantt
    title Rutina Diaria del Personal
    dateFormat HH:mm
    axisFormat %H:%M

    section Mañana
    Revisar citas del día           :08:00, 30m
    Atender primeras citas          :08:30, 2h
    Registrar nuevos pacientes      :10:30, 1h

    section Tarde
    Atender citas programadas       :13:00, 3h
    Actualizar estados              :16:00, 30m
    Generar reporte diario          :16:30, 30m

    section Cierre
    Revisar pendientes              :17:00, 30m
    Agendar citas para mañana       :17:30, 30m
```

---

**Versión**: 1.0  
**Última Actualización**: Diciembre 2025

---

_Estos diagramas están en formato Mermaid y se visualizan correctamente en GitHub, GitLab, y editores compatibles con Markdown._
