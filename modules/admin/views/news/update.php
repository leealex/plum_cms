<?php

/**
 * @var $this yii\web\View
 */

$this->title = 'Редактирование: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title];
?>
<div class="content-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
