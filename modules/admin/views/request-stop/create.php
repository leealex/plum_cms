<?php

/**
 * @var $this yii\web\View
 * @var $model \app\models\TrackRequestStop
 */

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

$this->title = 'Добавление записи';
$this->params['breadcrumbs'][] = ['label' => 'Стоп-лист', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-update">
    <?php $form = ActiveForm::begin(); ?>
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Свойства</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <label>Добавить исполнителя</label>
                <?= Select2::widget([
                    'model' => $model,
                    'attribute' => 'artist_id',
                    'options' => ['placeholder' => 'Выбрать исполнителя ...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'ajax' => [
                            'url' => 'search-artist',
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }')
                    ],
                ]) ?>
              <br>
              <p class="text-center"><strong>ИЛИ</strong></p>
              <label>Добавить песню</label>
                <?= Select2::widget([
                    'model' => $model,
                    'attribute' => 'track_id',
                    'options' => ['placeholder' => 'Выбрать песню ...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'ajax' => [
                            'url' => 'search-track',
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }')
                    ],
                ]) ?>
              <br>
            </div>
          </div>
          <div class="form-group">
              <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
