<?php

namespace app\modules\admin\widgets;

use yii\web\View;
use yii\web\AssetBundle;

class ImageBrowserAsset extends AssetBundle
{
    public $sourcePath = '@admin/widgets/image-browser';
    public $css = [
        'style.css'
    ];
    public $js = [
        'browser.js'
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