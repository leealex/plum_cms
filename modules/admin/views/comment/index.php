<?php

use rmrevin\yii\fontawesome\FA;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комменты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">
  <div class="panel panel-default">
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
                    'attribute' => 'user_id',
                    'value' => function ($model) {
                        return $model->user ? $model->user->username : 'Гость';
                    }
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'ip',
                    'value' => function ($model) {
                        return $model->ip . ' ' . Html::a('[Ban]',
                                ['comment/ban', 'ip' => $model->ip], ['class' => 'text-danger']);
                    }
                ],
                'text:raw',
                [
                    'attribute' => 'status',
                    'value' => function ($model) {
                        return $model->status ? 'Опубликован' : 'Не опубликован';
                    },
                    'filter' => ['Не опубликован', 'Опубликован']
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
                    'template' => '{approve} {delete}',
                    'buttons' => [
                        'approve' => function ($url, $model, $key) {
                            return Html::a(FA::i('check-square-o'), $url, ['data-method' => 'post']);
                        },
                    ]
                ]
            ],
        ]); ?>
    </div>
  </div>
</div>
