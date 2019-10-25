<?php

/**
 * @var $this yii\web\View
 */

$this->title = 'Добавление текстового блока';
$this->params['breadcrumbs'][] = ['label' => 'Текстовые блоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
