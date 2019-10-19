Yii 2 Admin module
============================

This module implements admin panel.

To enter admin panel use:

    login: admin
    password: admin

INSTALLATION
------------

Add this to the "required" section of your composer.json

```
"require": {
    "dmstr/yii2-adminlte-asset": "2.*",
    "vova07/yii2-imperavi-widget": "*",
    "rmrevin/yii2-fontawesome": "~2.17"
```    

OR install each extension separately:

### Install Imperavi editor:

`php composer.phar require --prefer-dist vova07/yii2-imperavi-widget "*"`

### Install AdminLTE theme:

`php composer.phar require dmstr/yii2-adminlte-asset "2.*"`

### Add the following snippet into the `app\config\web.php` before `return $config;`:

```
$config['bootstrap'][] = 'admin';
$config['modules']['admin'] = [
    'class' => 'app\modules\admin\Module'
];
```

### Add the following snippet into the `app\config\console.php` in `components` section:

```
'log' => [
    'targets' => [
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
        ],
        [
            'class' => 'yii\log\DbTarget',
            'levels' => ['error', 'warning'],
        ],
    ],
],
'authManager' => [
    'class' => 'yii\rbac\DbManager',
],
```

### Apply migrations from `app\modules\admin\migrations` by running console command:
 
`php yii migrate --migrationPath=@app/modules/admin/migrations/`
