<?php

namespace App\Database\Connectors;

use Illuminate\Database\Connectors\PostgresConnector as BasePostgresConnector;

class NeonPostgresConnector extends BasePostgresConnector
{
    /**
     * Get the DSN string for a host / port configuration.
     *
     * @param  array  $config
     * @return string
     */
    protected function getDsn(array $config)
    {
        $dsn = parent::getDsn($config);
        
        // Si es una conexión de Neon, agregar el endpoint ID
        if (isset($config['host']) && str_contains($config['host'], 'neon.tech')) {
            $host = $config['host'];
            
            // Extraer el endpoint ID (todo antes del primer punto)
            preg_match('/^([^.]+)/', $host, $matches);
            
            if (!empty($matches[1])) {
                $endpointId = $matches[1];
                $dsn .= ";options='endpoint={$endpointId}'";
            }
        }
        
        return $dsn;
    }
}
