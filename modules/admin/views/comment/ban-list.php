<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комменты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">
  <div class="panel panel-default">
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'id',
                    'headerOptions' => ['width' => 50]
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'ip',
                    'value' => function ($model) {
                        return $model->ip;
                    }
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
                ]
            ]
        ]); ?>
    </div>
  </div>
</div>
