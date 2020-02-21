<?php

/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\models\Category
 */

$this->title = 'Добавление категории';
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
