<?php

/**
 * @var $this yii\web\View
 * @var $model \app\models\Itunes
 */


use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Поиск в iTunes';

?>
<div class="itunes">

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Свойства</div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
          <div class="itunes-form">
              <?= $form->field($model, 'artist')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
            </div>
          </div>
            <?php ActiveForm::end(); ?>
        </div>
      </div>
        <?php if (count($model->artistsProvider->models) > 0) { ?>
          <div class="panel panel-default">
            <div class="panel-heading">Исполнители</div>
            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $model->artistsProvider,
                    'options' => ['class' => 'grid-view table-responsive'],
                    'tableOptions' => ['class' => 'table table-striped table-hover'],
                    'columns' => [
                        'artistId',
                        [
                            'attribute' => 'artistName',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a($model['artistName'], $model['artistLinkUrl'], ['target' => '_blank']);
                            },
                        ],
                        [
                            'label' => false,
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a('Песни', ['index', 'id' => $model['artistId']]);
                            }
                        ]
                    ]
                ]) ?>
            </div>
          </div>
        <?php } ?>
        <?php if (count($model->songsProvider->models) > 0) { ?>
          <div class="panel panel-default">
            <div class="panel-heading">Песни</div>
            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $model->songsProvider,
                    'options' => ['class' => 'grid-view table-responsive'],
                    'tableOptions' => ['class' => 'table table-striped table-hover'],
                    'columns' => [
                        [
                            'label' => false,
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model['wrapperType'] === 'track') {
                                    $url = str_replace('60x60', '600x600', $model['artworkUrl60']);
                                    return Html::a(Html::img($model['artworkUrl60'], ['class' => 'img-responsive']),
                                        $url, ['target' => '_blank']);
                                }
                                return '';
                            },
                            'contentOptions' => ['width' => 60]
                        ],
                        'artistName',
                        'collectionName',
                        'trackName'
                    ]
                ]) ?>
            </div>
          </div>
        <?php } ?>
    </div>
  </div>

</div>
