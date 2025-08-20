<?php

namespace Jazer\Oncalls\Http\Provider;

use Illuminate\Support\ServiceProvider;

class OncallsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../../config/database.php', 'jtoncallsconfig'  
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../../config/config.php' => config_path('jtoncallsconfig.php')
        ], 'jtoncallsconfig-config');
        
        $this->loadRoutesFrom( __DIR__ . '/../../../routes/api.php');

        config(['database.connections.conn_oncalls' => config('jtoncallsconfig.database_connection')]);
    }
}
