<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\URL;

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
        // Forzar HTTPS en producción (Render)
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

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
