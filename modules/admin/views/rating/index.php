<?php


use rmrevin\yii\fontawesome\FA;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \app\models\TrackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оценки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
  <div class="panel panel-default">
    <div class="panel-body">
      <?= Html::a('Все', ['rating/index'], ['class' => 'btn btn-default active'])?>
      <?= Html::a('Позитивные', ['rating/positive'], ['class' => 'btn btn-success'])?>
      <?= Html::a('Негативные', ['rating/negative'], ['class' => 'btn btn-danger'])?>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'grid-view table-responsive'],
            'tableOptions' => ['class' => 'table table-striped table-hover'],
            'rowOptions' => function ($model) {
                return ['class' => $model->up_vote ? 'success' : 'danger'];
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'track.artistName',
                [
                    'attribute' => 'track.title',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a($model->track->title, ['track/update', 'id' => $model->track_id]);
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
                'user.username',
                [
                    'attribute' => 'created_at',
                    'value' => function ($model) {
                        return date('d.m.Y H:i:s', $model->created_at);
                    }
                ]
            ],
        ]); ?>
    </div>
  </div>
</div>
