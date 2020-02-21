<?php

/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\models\TextBlock
 */

$this->title = 'Редактирование: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Текстовые блоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title];
?>
<div class="content-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
