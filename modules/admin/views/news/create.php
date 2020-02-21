<?php

/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\models\News
 */

$this->title = 'Добавление новости';
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
