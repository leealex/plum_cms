<?php

/**
 * @var $this yii\web\View
 */

$this->title = 'Добавление категории';
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
