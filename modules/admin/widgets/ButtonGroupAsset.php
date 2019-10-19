<?php

namespace app\modules\admin\widgets;

use yii\web\View;
use yii\web\AssetBundle;

class ButtonGroupAsset extends AssetBundle
{
    public $sourcePath = '@admin/widgets/button-group';
    public $css = [
        'button-group.css'
    ];
    public $js = [

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