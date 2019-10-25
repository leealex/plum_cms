<?php

/**
 * @var $this yii\web\View
 */

$this->title = 'Добавление пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
