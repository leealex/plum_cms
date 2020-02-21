<?php

use mihaildev\elfinder\ElFinder;
use yii\bootstrap\ActiveForm;
use yii\web\JsExpression;

/**
 * @var $this yii\web\View
 */

$this->title = 'Менеджер файлов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-manager-index">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= ElFinder::widget([
        'language' => 'ru',
        'controller' => 'admin/elfinder',
        'multiple' => true,
        'containerOptions' => ['style' => 'height:800px'],
        'callbackFunction' => new JsExpression('function(file, id){}')
    ]) ?>

    <?php ActiveForm::end() ?>
</div>
