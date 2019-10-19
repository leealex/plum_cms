<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Article */
/* @var $categories array */

$this->title = 'Редактирование: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Файлы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="file-manager-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
