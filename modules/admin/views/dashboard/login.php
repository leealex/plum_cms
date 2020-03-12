<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $form yii\bootstrap\ActiveForm
 * @var $model \app\modules\admin\models\LoginForm
 */

$this->title = 'Панель управления';
?>

<div class="login-box">
  <img src="/images/cp/cp_logo.png" alt="Plum" class="img-responsive">
  <div class="login-box-body">

      <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

      <?= $form->field($model, 'username')->textInput(['placeholder' => 'Логин или Email'])->label(false) ?>

      <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>

      <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>

      <?php ActiveForm::end(); ?>
  </div>
</div>
