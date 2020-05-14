<?php

use app\modules\admin\models\Category;
use app\modules\admin\models\Menu;
use app\modules\admin\widgets\ButtonGroup;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model Menu
 * @var $form yii\widgets\ActiveForm
 */
?>

<div class="content-form">
    <?php $form = ActiveForm::begin(); ?>
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::submitButton('Применить', ['class' => 'btn btn-primary', 'name' => 'action', 'value' => 'apply']) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'name' => 'action', 'value' => 'save']) ?>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-1"><?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-3">
            <?= $form->field($model, 'parent_id')->dropDownList(Menu::dropdownList(), ['prompt' => '']) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'status')->widget(ButtonGroup::class, [
                'default' => 1,
                'items' => [['label' => 'Активно', 'value' => 1], ['label' => 'Неактивно', 'value' => 0]]
            ])->label(false) ?>
        </div>
      </div>
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
