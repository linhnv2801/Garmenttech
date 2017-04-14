<?php

$config = [
    'components' => [
            'request' => [
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
            'cookieValidationKey' => 'xxxxxxx',
        ],
            'db' =>[
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host=127.0.0.1;dbname=demo',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
