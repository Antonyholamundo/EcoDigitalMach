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

// RUTA TEMPORAL - Instalación Definitiva (Compatible con cualquier Laravel)
Route::get('/install-admin', function () {
    $output = "<h1>Instalación de Usuario Admin</h1>";
    
    try {
        // 1. Ejecutar migraciones
        $output .= "<h3>1. Migraciones</h3>";
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        $output .= "<pre>" . \Illuminate\Support\Facades\Artisan::output() . "</pre>";

        // 2. Crear/Actualizar usuario CON HASH EXPLÍCITO
        $output .= "<h3>2. Usuario Administrador</h3>";
        
        // SOLUCIÓN DEFINITIVA: Usar DB directo para evitar CUALQUIER mutador/cast
        $hashedPassword = \Illuminate\Support\Facades\Hash::make('admin123');
        
        $userId = \Illuminate\Support\Facades\DB::table('users')->updateOrInsert(
            ['email' => 'admin@ecodigital.com'],
            [
                'name' => 'Administrador',
                'email' => 'admin@ecodigital.com',
                'password' => $hashedPassword,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // 3. VERIFICACIÓN INMEDIATA
        $output .= "<h3>3. Verificación</h3>";
        $user = \Illuminate\Support\Facades\DB::table('users')
            ->where('email', 'admin@ecodigital.com')
            ->first();
        
        if ($user) {
            $checkResult = \Illuminate\Support\Facades\Hash::check('admin123', $user->password);
            
            $output .= "<ul>";
            $output .= "<li><strong>Email:</strong> " . $user->email . "</li>";
            $output .= "<li><strong>Hash guardado:</strong> " . substr($user->password, 0, 20) . "...</li>";
            $output .= "<li><strong>Verificación Hash::check('admin123'):</strong> ";
            
            if ($checkResult) {
                $output .= "<span style='color:green; font-size:1.3em; font-weight:bold'>✓ CORRECTO</span></li>";
                $output .= "</ul>";
                $output .= "<div style='background:green; color:white; padding:20px; margin:20px 0; border-radius:10px; text-align:center;'>";
                $output .= "<h2>¡INSTALACIÓN EXITOSA!</h2>";
                $output .= "<p>Usuario: <strong>admin@ecodigital.com</strong></p>";
                $output .= "<p>Contraseña: <strong>admin123</strong></p>";
                $output .= "</div>";
            } else {
                $output .= "<span style='color:red; font-size:1.3em; font-weight:bold'>✗ FALLÓ</span></li>";
                $output .= "</ul>";
                $output .= "<div style='background:red; color:white; padding:20px; margin:20px 0;'>";
                $output .= "<p>ERROR: La contraseña no se verificó correctamente. Contacta soporte técnico.</p>";
                $output .= "</div>";
            }
        } else {
            $output .= "<p style='color:red'>ERROR: No se pudo crear el usuario</p>";
        }

        $output .= "<hr><div style='text-align:center'><a href='/login' style='font-size:22px; background:#0d6efd; color:white; padding:15px 40px; text-decoration:none; border-radius:8px; display:inline-block; font-weight:bold;'>IR AL LOGIN →</a></div>";

    } catch (\Exception $e) {
        $output .= "<div style='background:#dc3545; color:white; padding:20px; margin:20px 0;'>";
        $output .= "<h2>Error Crítico</h2>";
        $output .= "<p>" . $e->getMessage() . "</p>";
        $output .= "<pre>" . $e->getTraceAsString() . "</pre>";
        $output .= "</div>";
    }

    return $output;
});

// RUTA DE DIAGNÓSTICO - Probar Auth::attempt directamente
Route::get('/test-login', function () {
    $output = "<h1>Test de Auth::attempt</h1>";
    
    try {
        // 1. Verificar que el usuario existe
        $user = \Illuminate\Support\Facades\DB::table('users')
            ->where('email', 'admin@ecodigital.com')
            ->first();
        
        if (!$user) {
            return "<p style='color:red'>ERROR: El usuario admin@ecodigital.com NO existe en la BD. Visita /install-admin primero.</p>";
        }
        
        $output .= "<h3>1. Usuario en BD</h3>";
        $output .= "<ul>";
        $output .= "<li>Email: " . $user->email . "</li>";
        $output .= "<li>Hash: " . substr($user->password, 0, 30) . "...</li>";
        $output .= "</ul>";
        
        // 2. Verificar Hash manualmente
        $output .= "<h3>2. Verificación Manual de Hash</h3>";
        $manualCheck = \Illuminate\Support\Facades\Hash::check('admin123', $user->password);
        $output .= "<p>Hash::check('admin123', hash_de_bd): <strong style='color:" . ($manualCheck ? "green'>✓ PASA" : "red'>✗ FALLA") . "</strong></p>";
        
        // 3. Intentar Auth::attempt
        $output .= "<h3>3. Test de Auth::attempt</h3>";
        $credentials = [
            'email' => 'admin@ecodigital.com',
            'password' => 'admin123'
        ];
        
        $attemptResult = \Illuminate\Support\Facades\Auth::attempt($credentials);
        
        $output .= "<p>Auth::attempt(credentials): <strong style='color:" . ($attemptResult ? "green'>✓ ÉXITO" : "red'>✗ FALLÓ") . "</strong></p>";
        
        if ($attemptResult) {
            $output .= "<div style='background:green; color:white; padding:20px; margin:20px 0;'>";
            $output .= "<h2>¡Auth::attempt FUNCIONA!</h2>";
            $output .= "<p>El problema NO es la autenticación. Puede ser:</p>";
            $output .= "<ul><li>Sesiones no configuradas en Render</li>";
            $output .= "<li>APP_KEY no configurada</li>";
            $output .= "<li>Cookies bloqueadas</li></ul>";
            $output .= "</div>";
            
            // Logout para poder probar de nuevo
            \Illuminate\Support\Facades\Auth::logout();
        } else {
            $output .= "<div style='background:red; color:white; padding:20px; margin:20px 0;'>";
            $output .= "<h2>Auth::attempt FALLÓ</h2>";
            $output .= "<p>Pero Hash::check " . ($manualCheck ? "SÍ funciona" : "también falló") . ".</p>";
            $output .= "<p>Esto sugiere un problema con la configuración de Auth en Laravel.</p>";
            $output .= "</div>";
        }
        
        $output .= "<hr><a href='/login'>Ir al Login</a> | <a href='/install-admin'>Reinstalar Usuario</a>";
        
    } catch (\Exception $e) {
        $output .= "<div style='background:red; color:white; padding:20px;'>";
        $output .= "<h2>Error</h2>";
        $output .= "<p>" . $e->getMessage() . "</p>";
        $output .= "</div>";
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

