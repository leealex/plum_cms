<?php

/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\models\TextBlock
 */

$this->title = 'Добавление текстового блока';
$this->params['breadcrumbs'][] = ['label' => 'Текстовые блоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
