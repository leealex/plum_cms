<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-manager-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
    </div>
    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'base_url')->textInput(['disabled' => true]) ?></div>
    </div>
    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'path')->textInput(['disabled' => true]) ?></div>
    </div>
    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'type')->textInput(['disabled' => true]) ?></div>
    </div>
    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'size')->textInput(['disabled' => true]) ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
