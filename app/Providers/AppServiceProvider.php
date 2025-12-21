<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fix para Neon DB en Windows (inyectar endpoint ID)
        $host = config('database.connections.pgsql.host');
        
        if ($host && str_contains($host, 'neon.tech')) {
            // Extraer el endpoint ID (todo antes del primer punto)
            if (preg_match('/^([^.]+)/', $host, $matches)) {
                $endpointId = $matches[1];
                // Agregar options al DSN
                $currentOptions = config('database.connections.pgsql.options', []);
                $currentOptions['endpoint'] = $endpointId;
                
                config(['database.connections.pgsql.options' => $currentOptions]);
            }
        }
    }
}
