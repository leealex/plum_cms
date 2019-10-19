<?php

/* @var $this yii\web\View */
/* @var $model app\models\Content */

$this->title = 'Редактирование: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Контент', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title];
?>
<div class="content-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
