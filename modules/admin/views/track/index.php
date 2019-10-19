<?php


use app\models\Track;
use app\models\TrackSearch;
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var $this yii\web\View
 * @var $searchModel TrackSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Песни';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
  <div class="panel panel-default">
    <div class="panel-body">
      <?= Html::a('Удалить дубликаты', ['track/fix-doubles'], ['class' => 'btn btn-danger'])?>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => ['class' => 'grid-view table-responsive'],
            'tableOptions' => ['class' => 'table table-striped table-hover'],
            'columns' => [
                [
                    'label' => false,
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::img($model->cover, ['class' => 'img-responsive']);
                    },
                    'headerOptions' => ['width' => 50]
                ],
                'id',
                [
                    'attribute' => 'server',
                    'value' => function ($model) {
                        return Track::$servers[$model->server];
                    },
                    'filter' => Track::$servers
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'artist_name',
                    'value' => function ($model) {
                        return Html::a($model->artist->name, ['track/artist-update', 'id' => $model->artist->id]);
                    }
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'title',
                    'value' => function ($model) {
                        return Html::a($model->title, ['track/update', 'id' => $model->id]);
                    }
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'album_title',
                    'value' => function ($model) {
                        return $model->album
                            ? Html::a($model->album->title, ['track/album-update', 'id' => $model->album->id])
                            : ' - ';
                    }
                ],
                'up_votes',
                'down_votes',
                'favorites',
                'historyCount',
                [
                    'attribute' => 'created_at',
                    'value' => function ($model) {
                        return date('d.m.Y H:i:s', $model->created_at);
                    }
                ],
                [
                    'attribute' => 'updated_at',
                    'value' => function ($model) {
                        return date('d.m.Y H:i:s', $model->updated_at);
                    }
                ]
            ],
        ]); ?>
    </div>
  </div>
</div>
