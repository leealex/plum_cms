<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\models\SystemLog
 */

$this->title = 'Ошибка #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Журнал событий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-log-view">
  <div class="panel panel-default">
    <div class="panel-heading"><?= Html::a('Удалить', ['delete', 'id' => $model->id],
            ['class' => 'btn btn-danger', 'data' => ['method' => 'post']]) ?></div>
    <div class="panel-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'level',
                'category',
                [
                    'attribute' => 'log_time',
                    'format' => 'datetime',
                    'value' => (int)$model->log_time
                ],
                'prefix:ntext',
                [
                    'attribute' => 'message',
                    'format' => 'raw',
                    'value' => Html::tag('pre', $model->message, ['style' => 'white-space: pre-wrap'])
                ],
            ],
        ]) ?>
    </div>
  </div>
</div>