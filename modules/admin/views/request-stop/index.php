<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \app\models\TrackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Стоп-лист заявок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
  <div class="panel panel-default">
    <div class="panel-heading"><?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?></div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'grid-view table-responsive'],
            'tableOptions' => ['class' => 'table table-striped table-hover'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'artist.name',
                    'value' => function ($model) {
                        if ($model->artist) {
                            return $model->artist->name;
                        } else {
                            return $model->track ? $model->track->artistName : ' - ';
                        }
                    }
                ],
                [
                    'label' => 'title',
                    'value' => function ($model) {
                        return $model->track ? $model->track->title : ' Все треки ';
                    }
                ],
                [
                    'label' => false,
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a('Удалить', ['delete', 'id' => $model->id],
                            ['data-method' => 'post', 'class' => 'btn btn-sm btn-danger']);
                    }
                ]
            ]
        ]) ?>
    </div>
  </div>
</div>
