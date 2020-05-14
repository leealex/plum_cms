<?php

use app\modules\admin\widgets\GridView;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $searchModel \app\modules\admin\models\CategorySearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::a('Создать новый элемент', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'title',
                [
                    'format' => 'raw',
                    'attribute' => 'url',
                    'value' => function ($model) {
                        return $model->children ? $this->render('_children', ['children' => $model->children]) : $model->url;
                    }
                ],
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
                    'attribute' => 'order',
                    'headerOptions' => ['width' => 50],
                    'contentOptions' => ['class' => 'text-center'],
                ]
            ]
        ]); ?>
    </div>
  </div>
</div>
