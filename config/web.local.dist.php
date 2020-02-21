<?php

use yii\swiftmailer\Mailer;

$config = [
    'components' => [
        'mailer' => [
            'class' => Mailer::class,
            'useFileTransport' => false
//            'transport' => [
//                'class' => Swift_SmtpTransport::class,
//                'host' => $params['smtp_host'],
//                'username' => $params['smtp_username'],
//                'password' => $params['smtp_password'],
//                'port' => $params['smtp_port'],
//                'encryption' => $params['smtp_encryption']
//            ]
        ]
    ],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1', '10.10.10.1']
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '10.10.10.1']
        ]
    ]
];

$config['bootstrap'][] = 'debug';
//$config['bootstrap'][] = 'gii';

return $config;