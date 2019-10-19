<?php

namespace app\modules\admin\widgets;

use yii\web\View;
use yii\web\AssetBundle;

class FileInputAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/admin/widgets/file-input';
    public $css = [
        'style.css'
    ];
    public $js = [
        'Sortable.js',
        'file-input.js'

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