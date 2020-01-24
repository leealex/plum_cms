<?php

use yii\helpers\ArrayHelper;

$config = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=plum-cms',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

if (file_exists(__DIR__ . '/db.local.php')) {
    $config = ArrayHelper::merge($config, require __DIR__ . '/db.local.php');
}

return $config;