<?php


use rmrevin\yii\fontawesome\FA;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel \app\models\AlbumSearch
 */

$this->title = 'Альбомы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
  <div class="panel panel-default">
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => ['class' => 'grid-view table-responsive'],
            'tableOptions' => ['class' => 'table table-striped table-hover'],
            'columns' => [
                [
                    'label' => '',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::img($model->coverThumb);
                    }
                ],
                [
                    'attribute' => 'title',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a($model->title, ['track/album-update', 'id' => $model->id]);
                    }
                ],
                [
                    'attribute' => 'artist.name',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a($model->artist->name, ['track/artist-update', 'id' => $model->artist_id]);
                    }
                ],
                [
                    'label' => FA::i('eye') . '/' . FA::i('eye-slash'),
                    'encodeLabel' => false,
                    'value' => function ($model) {
                        /** @var \app\models\Album $model */
                        return $model->countTracksWithCover . '/' . $model->countTracksWithoutCover;
                    }
                ],
                [
                    'label' => '',
                    'format' => 'raw',
                    'value' => function ($model) {
                        /** @var \app\models\Album $model */
                        return Html::a('Установить обложки', ['track/cover-album-track', 'id' => $model->id],
                            ['class' => 'btn btn-xs btn-success']);
                    }
                ],
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
