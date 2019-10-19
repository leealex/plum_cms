<?php

use app\models\ArtistSearch;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $searchModel ArtistSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Исполнители';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
  <div class="panel panel-default">
    <div class="panel-body">
      <?= Html::a('Добавить исполнителя', ['track/artist-update'], ['class' => 'btn btn-success'])?>
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
                        'format' => 'raw',
                        'attribute' => 'name',
                        'value' => function ($model) {
                            return Html::a($model->name, ['track/artist-update', 'id' => $model->id]);
                        }
                    ],
                    [
                        'label' => 'Песен',
                        'value' => function ($model) {
                            return count($model->tracks);
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
