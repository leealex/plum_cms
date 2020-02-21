<?php

use yii\helpers\Html;
use app\modules\admin\widgets\GridView;
use yii\log\Logger;

/**
 * @var $this yii\web\View
 * @var $searchModel \app\modules\admin\models\SystemLogSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Журнал событий';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-log-index">
  <div class="panel panel-default">
    <div class="panel-heading"><?= Html::a('Очистить', false,
            ['class' => 'btn btn-danger', 'data-method' => 'delete']) ?></div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'rowOptions' => function ($model) {
                if ($model->level === 1) {
                    return ['class' => 'danger'];
                } elseif ($model->level === 4) {
                    return ['class' => 'info'];
                } else {
                    return [];
                }
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'level',
                    'value' => function ($model) {
                        return Logger::getLevelName($model->level);
                    },
                    'filter' => [
                        Logger::LEVEL_ERROR => 'error',
                        Logger::LEVEL_WARNING => 'warning',
                        Logger::LEVEL_INFO => 'info',
                        Logger::LEVEL_TRACE => 'trace',
                        Logger::LEVEL_PROFILE_BEGIN => 'profile begin',
                        Logger::LEVEL_PROFILE_END => 'profile end'
                    ]
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'category',
                    'value' => function ($model) {
                        return Html::a($model->category, ['log/view', 'id' => $model->id]);
                    }
                ],
                'prefix',
                [
                    'attribute' => 'log_time',
                    'format' => 'datetime',
                    'value' => function ($model) {
                        return (int)$model->log_time;
                    }
                ]
            ]
        ]); ?>
    </div>
  </div>
</div>