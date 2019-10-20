<?php

use app\modules\admin\models\User;
use rmrevin\yii\fontawesome\FA;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \app\modules\admin\models\UserSearch */
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
                    'class' => \yii\grid\ActionColumn::class
                ]
            ],
        ]); ?>
    </div>
  </div>
</div>
