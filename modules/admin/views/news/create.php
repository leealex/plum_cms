<?php

/**
 * @var $this yii\web\View
 */

$this->title = 'Добавление новости';
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
