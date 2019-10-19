<?php


use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel \app\models\TrackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заяки';
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
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'label' => 'Время заявки',
                    'attribute' => 'created_at',
                    'value' => function ($model) {
                        return date('d.m.Y H:i:s', $model->created_at);
                    }
                ],
                [
                    'label' => 'Вышло в эфир',
                    'attribute' => 'played_at',
                    'value' => function ($model) {
                        return date('d.m.Y H:i:s', $model->played_at);
                    }
                ],
                'track.artistName',
                'track.title',
                'user.username'
            ]
        ]); ?>
    </div>
  </div>

</div>
