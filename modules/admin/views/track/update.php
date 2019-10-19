<?php

/**
 * @var $this yii\web\View
 * @var $model \app\models\Track
 */

use app\models\Track;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use rmrevin\yii\fontawesome\FA;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Песни', 'url' => ['index']];
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
              <?= $form->field($model, 'artist_id')->widget(Select2::class, [
                  'initValueText' => $model->artist->name,
                  'options' => ['placeholder' => 'Название исполнителя ...'],
                  'pluginOptions' => [
                      'minimumInputLength' => 3,
                      'ajax' => [
                          'url' => '/admin/track/search-artist',
                          'dataType' => 'json',
                          'data' => new JsExpression('function(params) { return {q:params.term}; }')
                      ],
                      'escapeMarkup' => new JsExpression('function (markup) { return markup; }')
                  ],
              ]) ?>

              <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'album_title')->widget(Select2::class, [
                  'options' => ['placeholder' => 'Название альбома ...'],
                  'pluginOptions' => [
                      'tags' => true,
                      'allowClear' => true,
                      'minimumInputLength' => 3,
                      'ajax' => [
                          'url' => '/admin/track/search-album',
                          'dataType' => 'json',
                          'data' => new JsExpression('function(params) { return {q:params.term}; }')
                      ],
                      'escapeMarkup' => new JsExpression('function (markup) { return markup; }')
                  ],
              ]) ?>

              <?= $form->field($model, 'file')->fileInput()->label('Загрузить обложку с компьютера') ?>

              <?= $form->field($model, 'fileUrl')->textInput()->label('Загрузить обложку по ссылке') ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Эскиз
          <span class="pull-right">
            <?= Html::a('Пересоздать', ['track/update-thumbnail', 'id' => $model->id],
                ['class' => 'btn btn-xs btn-primary']) ?>
          </span>
        </div>
        <div class="panel-body">
            <?= Html::img($model->coverThumb, ['class' => 'img-responsive']) ?>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Обложка
          <span class="pull-right">
            <?= Html::a('Удалить обложку', ['track/delete-cover', 'id' => $model->id],
                ['class' => 'btn btn-xs btn-danger']) ?>
            <?= Html::a('Скопировать обложку в другие треки', ['track/copy-cover', 'id' => $model->id],
                ['class' => 'btn btn-xs btn-primary']) ?>
          </span>
        </div>
        <div class="panel-body">
            <?= Html::img($model->cover, ['class' => 'img-responsive']) ?>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Слова и аккорды</div>
        <div class="panel-body">
            <?= $form->field($model, 'chords')->widget(CKEditor::class, [
                'options' => ['rows' => 6],
                'preset' => 'full'
            ])->label(false) ?>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Оценки</div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => new ArrayDataProvider(['models' => $model->ratings]),
                'options' => ['class' => 'grid-view table-responsive'],
                'tableOptions' => ['class' => 'table table-striped table-hover'],
                'rowOptions' => function ($model) {
                    return ['class' => $model->up_vote ? 'success' : 'danger'];
                },
                'columns' => [
                    [
                        'attribute' => 'created_at',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return date('d.m.Y H:i:s', $model->created_at);
                        }
                    ],
                    [
                        'label' => 'Оценка',
                        'format' => 'raw',
                        'contentOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            return $model->up_vote ? FA::i('thumbs-up') : FA::i('thumbs-down');
                        }
                    ],
                    [
                        'attribute' => 'user.username',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->user->username;
                        }
                    ]
                ],
            ]); ?>
        </div>
      </div>
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
