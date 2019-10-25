<?php

/**
 * @var $this yii\web\View
 */

$this->title = 'Добавление статьи';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
