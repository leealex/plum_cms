<?php

use app\models\Content;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">
    <?php $form = ActiveForm::begin(); ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'text')->widget(CKEditor::class, [
                'options' => ['rows' => 6],
                'preset' => 'custom',
                'clientOptions' => [
                    'extraPlugins' => 'iframe,justify',
                    'toolbarGroups' => [
                        ['name' => 'document', 'groups' => ['mode', 'document', 'doctools']],
                        ['name' => 'clipboard', 'groups' => ['clipboard', 'undo']],
                        ['name' => 'editing', 'groups' => [ 'find', 'selection', 'spellchecker']],
                        ['name' => 'forms'],
                        ['name' => 'basicstyles', 'groups' => ['basicstyles', 'colors','cleanup']],
                        ['name' => 'paragraph', 'groups' => [ 'list', 'indent', 'blocks', 'align', 'bidi' ]],
                        ['name' => 'links'],
                        ['name' => 'insert'],
                        '/',
                        ['name' => 'styles'],
                        ['name' => 'blocks'],
                        ['name' => 'colors'],
                        ['name' => 'tools'],
                        ['name' => 'others'],
                        ['name' => 'iframe'],
                    ]
                ]
            ]) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"><?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'position')
                ->dropDownList(Content::$positions, ['prompt' => 'Выбрать ...']) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'order')->textInput() ?></div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'container')->checkbox() ?>

            <?= $form->field($model, 'show_title')->checkbox() ?>

            <?= $form->field($model, 'active')->checkbox() ?>
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-body">
        <?= Html::submitButton('Применить', ['class' => 'btn btn-primary', 'name' => 'action', 'value' => 'apply']) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'name' => 'action', 'value' => 'save']) ?>
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
