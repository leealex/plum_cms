<?php

use app\models\User;
use rmrevin\yii\fontawesome\FA;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
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

                'id',
                [
                    'format' => 'raw',
                    'attribute' => 'username',
                    'value' => function ($model) {
                        $html = Html::a($model->username, ['user/update', 'id' => $model->id]);
                        $html .= ' ' . Html::a(FA::i('sign-in'), ['user/sign-in', 'id' => $model->id]);
                        return $html;
                    }
                ],
                'rating',
                'email:email',
                [
                    'label' => 'Роль',
                    'value' => function ($model) {
                        return User::$roles[$model->role];
                    }
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'created_at',
                    'value' => function ($model) {
                        return date('d.m.Y H:i:s', $model->created_at);
                    }
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'updated_at',
                    'value' => function ($model) {
                        return date('d.m.Y H:i:s', $model->updated_at);
                    }
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'reminded_at',
                    'value' => function ($model) {
                        return $model->reminded_at ? date('d.m.Y H:i:s', $model->reminded_at) : '-';
                    }
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'logged_at',
                    'value' => function ($model) {
                        return Yii::$app->formatter->asRelativeTime($model->logged_at);
                    }
                ],
                'ip',
                [
                    'class' => \yii\grid\ActionColumn::class
                ]
            ],
        ]); ?>
    </div>
  </div>
</div>
