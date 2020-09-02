<?php

use app\modules\admin\models\TextBlock;
use app\modules\admin\widgets\ButtonGroup;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model TextBlock
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
        <div class="col-md-6"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?></div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'status')->widget(ButtonGroup::class, [
                'default' => 1,
                'items' => [['label' => 'Опубликовано', 'value' => 1], ['label' => 'Не опубликовано', 'value' => 0]]
            ])->label(false) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'text')->widget(CKEditor::class, [
                'editorOptions' => ElFinder::ckeditorOptions('admin/elfinder', ['preset' => 'standard', 'extraAllowedContent' => 'iframe[*]']),
            ]) ?>
        </div>
      </div>
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
