<?php

/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\models\User
 */

$this->title = 'Добавление пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
