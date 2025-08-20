<?php

return [
    'database_connection' => [
        'driver'        => 'mysql',
        'host'          => env('CONN_ONCALLS_IP', config('jtoncallsconfig.conn_oncalls_ip')),
        'port'          => env('CONN_ONCALLS_PT', config('jtoncallsconfig.conn_oncalls_pt')),
        'database'      => env('CONN_ONCALLS_DB', config('jtoncallsconfig.conn_oncalls_db')),
        'username'      => env('CONN_ONCALLS_UN', config('jtoncallsconfig.conn_oncalls_un')),
        'password'      => env('CONN_ONCALLS_PW', config('jtoncallsconfig.conn_oncalls_pw')),
        'charset'       => 'utf8mb4',
        'collation'     => 'utf8mb4_unicode_ci',
        'prefix'        => ''
    ],
];