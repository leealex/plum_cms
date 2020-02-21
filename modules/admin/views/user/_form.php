<?php

use app\modules\admin\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $form yii\widgets\ActiveForm
 * @var $model User
 */

$options = $model->id === 1 ? ['disabled' => 'disabled'] : [];
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-2"><?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'tmp_password')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'role')->dropDownList(User::$roles, $options) ?></div>
      </div>
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
