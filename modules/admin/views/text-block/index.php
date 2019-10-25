<?php

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var $this yii\web\View
 * @var $searchModel \app\modules\admin\models\TextBlockSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Текстовые блоки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::a('Создать текстовый блок', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => ['class' => 'grid-view table-responsive'],
            'tableOptions' => ['class' => 'table table-striped table-hover'],
            'columns' => [
                [
                    'attribute' => 'id',
                    'headerOptions' => ['width' => 50]
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'title',
                    'value' => function ($model) {
                        return Html::a($model->title, ['text-block/update', 'id' => $model->id]);
                    }
                ],
                'slug',
                [
                    'format' => 'raw',
                    'attribute' => 'status',
                    'headerOptions' => ['width' => 50],
                    'contentOptions' => ['class' => 'text-center'],
                    'value' => function ($model) {
                        return $model->status
                            ? '<span class="label label-success">Да</span>'
                            : '<span class="label label-danger">Нет</span>';
                    },
                    'filter' => ['Нет', 'Да']
                ],
                [
                    'headerOptions' => ['width' => 150],
                    'attribute' => 'created_at',
                    'value' => function ($model) {
                        return date('d.m.Y H:i', $model->created_at);
                    }
                ],
                [
                    'headerOptions' => ['width' => 150],
                    'attribute' => 'updated_at',
                    'value' => function ($model) {
                        return date('d.m.Y H:i', $model->updated_at);
                    }
                ],
                [
                    'class' => ActionColumn::class,
                    'visibleButtons' => ['view' => false, 'update' => false]
                ]
            ],
        ]); ?>
    </div>
  </div>
</div>
