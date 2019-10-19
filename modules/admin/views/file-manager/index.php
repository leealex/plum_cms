<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model \app\modules\admin\models\UploadForm */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Менеджер файлов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-category-index">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'file')->fileInput()->label(false) ?>
            <?= Html::submitButton('Загрузить файл', ['class' => 'btn btn-xs btn-success']) ?>
        </div>
        <div class="col-md-1 col-md-offset-9">
            <?= Html::a('Обновить пути', '/admin/file-manager/update-path', ['class' => 'btn btn-xs btn-default']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'grid-view table-responsive'],
        'tableOptions' => ['class' => 'table table-striped table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Тип',
                'value' => function ($model) {
                    $type = explode('/', $model->type);
                    return $type[0] === 'image' ? '<i class="fa fa-file-image-o"></i>' : '<i class="fa fa-file"></i>';
                },
                'format' => 'html'
            ],
            'name',
            'base_url',
            [
                'label' => 'Эскиз',
                'value' => function ($model) {
                    $type = explode('/', $model->type);
                    return $type[0] === 'image' ? Html::img($model->base_url, ['width' => 100]) : '';
                },
                'format' => 'html'
            ],
            'size:shortSize',

            'created_at:date',
            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'view' => false,
                ],
            ],
        ],
    ]); ?>

</div>
