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

// RUTA TEMPORAL - Para diagnosticar y arreglar BD
Route::get('/install-admin', function () {
    try {
        // 1. Intentar correr migraciones
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        $migrateOutput = \Illuminate\Support\Facades\Artisan::output();

        // 2. Crear usuario si no existe
        $userStatus = "";
        if (!\App\Models\User::where('email', 'admin@ecodigital.com')->exists()) {
            \App\Models\User::create([
                'name' => 'Administrador',
                'email' => 'admin@ecodigital.com',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            ]);
            $userStatus = "Usuario creado exitosamente.";
        } else {
            $userStatus = "Usuario ya existía.";
        }

        return "<h1>Diagnóstico de Instalación</h1>" .
               "<h3>Migraciones:</h3><pre>$migrateOutput</pre>" .
               "<h3>Usuario:</h3><p>$userStatus</p>" .
               "<hr><a href='/login'>Ir al Login</a>";

    } catch (\Exception $e) {
        return "<h1>Error Crítico</h1>" .
               "<p>" . $e->getMessage() . "</p>" .
               "<h3>Trace:</h3><pre>" . $e->getTraceAsString() . "</pre>";
    }
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

