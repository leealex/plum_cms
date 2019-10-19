<?php

/* @var $this yii\web\View */
/* @var $model app\models\Content */

$this->title = 'Добавление материала';
$this->params['breadcrumbs'][] = ['label' => 'Контент', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
