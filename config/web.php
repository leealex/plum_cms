<?php

use app\modules\admin\Module;
use yii\swiftmailer\Mailer;

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
            'cookieValidationKey' => 'o2riGe6dS24ylyEdH9nqSrAX2Nx2m-BB',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\admin\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => Mailer::class,
            'transport' => [
                'class' => Swift_SmtpTransport::class,
                'host' => $params['smtp_host'],
                'username' => $params['smtp_username'],
                'password' => $params['smtp_password'],
                'port' => $params['smtp_port'],
                'encryption' => $params['smtp_encryption'],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'except' => ['yii\web\HttpException*']
                ],
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'except' => ['yii\web\HttpException*']
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'admin/login' => 'admin/dashboard/login',
                'page/<slug:[\w_-]+>' => 'page/view',
                '<controller>/<id:\d+>' => '<controller>/view',
                '<controller>/<action>/<id:\d+>' => '<controller>/<action>',
                '<module>/<controller>/<action>/<id:\d+>' => '<module>/<controller>/<action>',
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => ' - ',
        ],
    ],
    'modules' => [
        'admin' => Module::class
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
