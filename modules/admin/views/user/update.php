<?php

/**
 * @var $this yii\web\View
 */

$this->title = 'Редактирование: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="user-update">
  <div class="panel panel-default">
    <div class="panel-body">
        <?= $this->render('_form', ['model' => $model]) ?>
    </div>
  </div>
</div>
