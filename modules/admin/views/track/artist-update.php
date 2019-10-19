<?php

/**
 * @var $this yii\web\View
 * @var $model \app\models\Artist
 * @var $group array
 */

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

$this->title = $model->isNewRecord ? 'Добавление исполнителя' : ('Редактирование: ' . ' ' . $model->id);
$this->params['breadcrumbs'][] = ['label' => 'исполнители', 'url' => ['track/artists']];
$this->params['breadcrumbs'][] = 'Редактирование';

?>
<div class="user-update">
    <?php $form = ActiveForm::begin(); ?>
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Свойства</div>
        <div class="panel-body">
          <div class="user-form">
              <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'groups')->widget(Select2::class, [
                  'initValueText' => $group,
                  'options' => ['placeholder' => 'Связанные исполнители ...'],
                  'pluginOptions' => [
                      'multiple' => true,
                      'allowClear' => true,
                      'minimumInputLength' => 3,
                      'ajax' => [
                          'url' => '/admin/track/search-artist',
                          'dataType' => 'json',
                          'data' => new JsExpression('function(params) { return {q:params.term}; }')
                      ],
                      'escapeMarkup' => new JsExpression('function (markup) { return markup; }')
                  ],
              ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
