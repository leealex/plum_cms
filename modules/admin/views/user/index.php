<?php

use app\modules\admin\models\User;
use app\modules\admin\widgets\GridView;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $searchModel \app\modules\admin\models\UserSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
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
                    'attribute' => 'role',
                    'value' => function ($model) {
                        return User::$roles[$model->role];
                    },
                    'filter' =>User::$roles
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
                ]
            ]
        ]); ?>
    </div>
  </div>
</div>
