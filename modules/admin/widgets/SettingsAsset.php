<?php

namespace app\modules\admin\widgets;

use yii\web\View;
use yii\web\AssetBundle;

class SettingsAsset extends AssetBundle
{
    public $sourcePath = '@admin/widgets/settings';
    public $css = [];
    public $js = [
        'settings.js'
    ];
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
} 