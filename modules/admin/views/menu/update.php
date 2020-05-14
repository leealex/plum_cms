<?php

/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\models\Category
 */

$this->title = 'Редактирование: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title];
?>
<div class="content-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
