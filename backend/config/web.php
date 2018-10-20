<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'asdasdasda',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'session',
                    'extraPatterns' => [
                        'GET index' => 'index',
                        'index' => 'options',

                        'GET most-popular' => 'most-popular',
                        'most-popular' => 'options',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'user',
                    'extraPatterns' => [
                        'GET index' => 'index',
                        'index' => 'options',

                        'GET top-viewers' => 'top-viewers',
                        'top-viewers' => 'options',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'viewer',
                    'extraPatterns' => [
                        'GET index' => 'index',
                        'index' => 'options',

                        'GET count' => 'all-counts',
                        'count' => 'options',

                        'GET unique-viewers' => 'unique-viewers',
                        'count' => 'options',

                        'GET browsers' => 'browsers',
                        'count' => 'options',
                    ],
                ],
            ],      
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
