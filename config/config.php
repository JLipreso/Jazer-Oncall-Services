<?php

return [
    /** Project Configurations */
    'project_refid'                 => env('PROJECT_REFID', ''),


    /** Database Connection Configurations */
    'conn_oncalls_ip'                 => env('CONN_ONCALLS_IP', env('DB_HOST')),
    'conn_oncalls_pt'                 => env('CONN_ONCALLS_PT', env('DB_PORT')),
    'conn_oncalls_db'                 => env('CONN_ONCALLS_DB', env('DB_DATABASE')),
    'conn_oncalls_un'                 => env('CONN_ONCALLS_UN', env('DB_USERNAME')),
    'conn_oncalls_pw'                 => env('CONN_ONCALLS_PW', env('DB_PASSWORD')),

    /** Query parameters */
    'fetch_paginate_max'            => env('FETCH_PAGINATE_MAX', 25),
];