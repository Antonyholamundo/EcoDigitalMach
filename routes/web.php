<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\AuthController;

// Rutas de Autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Página de inicio pública
Route::get('/', function () {
    return view('logica.index'); 
});

// RUTA TEMPORAL - Diagnóstico PROFUNDO
Route::get('/install-admin', function () {
    $output = "<h1>Diagnóstico Profundo de Sistema</h1>";
    
    // 1. Verificar Variables de Entorno
    $envVars = ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'];
    $output .= "<h3>1. Verificación de Entorno (.env)</h3><ul>";
    foreach ($envVars as $var) {
        $val = env($var);
        $status = !empty($val) ? "<span style='color:green'>OK</span>" : "<span style='color:red'>VACÍO/MISSING</span>";
        // Ocultar password
        if ($var === 'DB_PASSWORD' && !empty($val)) $val = '******'; 
        $output .= "<li><strong>$var</strong>: $val ($status)</li>";
    }
    $output .= "</ul>";

    try {
        // 2. Intentar Conexión PDO Cruda (Copia exacta de cómo Laravel conecta)
        $output .= "<h3>2. Prueba de Conexión Raw PDO</h3>";
        
        $dsn = "pgsql:host=".env('DB_HOST').";port=".env('DB_PORT').";dbname=".env('DB_DATABASE').";sslmode=require";
        $output .= "<p>Intentando conectar con DSN: <code>$dsn</code> ...</p>";
        
        $pdo = new PDO($dsn, env('DB_USERNAME'), env('DB_PASSWORD'));
        $output .= "<p style='color:green'><strong>¡Conexión PDO Exitosa!</strong></p>";

        // 3. Intentar Migraciones Laravel
        $output .= "<h3>3. Ejecutando Migraciones (Laravel)</h3>";
        
        // Forzar configuración por si acaso la cache estorba
        config(['database.connections.pgsql.sslmode' => 'require']);
        
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        $output .= "<pre>" . \Illuminate\Support\Facades\Artisan::output() . "</pre>";

        // 4. Crear o Actualizar usuario
        $output .= "<h3>4. Creación/Actualización de Usuario</h3>";
        $output .= "<p>Laravel Version: " . app()->version() . "</p>";
        
        // Intentamos PRIMERO asumiendo que el modelo tiene 'hashed' cast
        $user = \App\Models\User::updateOrCreate(
            ['email' => 'admin@ecodigital.com'],
            [
                'name' => 'Administrador',
                'password' => 'admin123', // Intentamos texto plano primero
                'email_verified_at' => now(),
            ]
        );

        // VERIFICACIÓN INMEDIATA
        $freshUser = \App\Models\User::find($user->id);
        $storedHash = $freshUser->getAttributes()['password']; // Acceder al atributo crudo
        $isHashed = strlen($storedHash) > 50 && str_starts_with($storedHash, '$2y$');
        $checkPass = \Illuminate\Support\Facades\Hash::check('admin123', $storedHash);

        $output .= "<ul>";
        $output .= "<li><strong>Valor guardado (Raw):</strong> " . substr($storedHash, 0, 10) . "... (" . strlen($storedHash) . " chars)</li>";
        $output .= "<li><strong>¿Parece Hasheado?</strong> " . ($isHashed ? "SÍ" : "NO (Texto Plano)") . "</li>";
        $output .= "<li><strong>Hash::check('admin123'):</strong> " . ($checkPass ? "<span style='color:green; font-weight:bold'>PASÓ (Correcto)</span>" : "<span style='color:red; font-weight:bold'>FALLÓ</span>") . "</li>";
        $output .= "</ul>";

        // Si falló, significa que el cast 'hashed' NO funcionó (ej. Laravel 10 con sintaxis de Laravel 11, o modelo defectuoso).
        // Intentamos corregir MANUALMENTE.
        if (!$checkPass) {
             $output .= "<p style='color:orange'><strong>Detectado fallo en auto-hashing. Aplicando Hash::make manual...</strong></p>";
             $user->password = \Illuminate\Support\Facades\Hash::make('admin123');
             $user->save();
             
             // Re-verificar
             $freshUser = \App\Models\User::find($user->id);
             $storedHash = $freshUser->getAttributes()['password'];
             $checkPass = \Illuminate\Support\Facades\Hash::check('admin123', $storedHash);
             
             $output .= "<ul><li><strong>Re-Verificación Hash::check:</strong> " . ($checkPass ? "<span style='color:green'>AHORA SÍ FUNCIONA</span>" : "<span style='color:red'>SIGUE FALLANDO</span>") . "</li></ul>";
        }

        $output .= "<hr><a href='/login' style='font-size:20px; background: blue; color: white; padding: 10px; text-decoration: none; border-radius: 5px;'>IR AL LOGIN AHORA</a>";

    } catch (\Exception $e) {
        $output .= "<h2 style='color:red'>FALLÓ: " . $e->getMessage() . "</h2>";
        $output .= "<h4>Stack Trace:</h4><pre>" . $e->getTraceAsString() . "</pre>";
    }

    return $output;
});

// Rutas Protegidas (Solo usuarios logueados)
Route::middleware('auth')->group(function () {
    
    // Citas
    Route::get('/citas/atendidos', [CitaController::class, 'atendidos'])->name('citas.atendidos');
    Route::post('/citas/{id}/toggle-status', [CitaController::class, 'toggleStatus'])->name('citas.toggleStatus');
    Route::resource('citas', CitaController::class)->names(['index' => 'logica.citas']);

    // Pacientes
    Route::resource('pacientes', PacienteController::class)->names(['index' => 'logica.pacientes']);

    // Reportes
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
    Route::get('/reportes/pacientes/pdf', [ReporteController::class, 'pacientesPdf'])->name('reportes.pacientes.pdf');
    Route::get('/reportes/pacientes/excel', [ReporteController::class, 'pacientesExcel'])->name('reportes.pacientes.excel');
    Route::get('/reportes/pacientes/csv', [ReporteController::class, 'pacientesCsv'])->name('reportes.pacientes.csv');
});

