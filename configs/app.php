<?php

$databaseConfigs = require ROOT . 'configs/database.php';

$appConfigs = [
    'views' => [
        'path' => 'views/'
    ],
    'controllers' => [
        'path' => 'controllers/'
    ],
    'models' => [
        'path' => 'models/'
    ],
    'layouts' => [
        'default' => [
            'path' => 'layouts/app.php',
            'data' => [
                'appName' => 'My Framework'
            ]
        ],
        'admin' => [
            'path',
            'data'
        ]
    ]
];

return array_merge($databaseConfigs, $appConfigs);