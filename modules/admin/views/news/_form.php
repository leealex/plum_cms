<?php

use app\modules\admin\models\News;
use app\modules\admin\models\Category;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">
    <?php $form = ActiveForm::begin(); ?>
  <div class="panel panel-default">
    <div class="panel-body">
        <?= Html::submitButton('Применить', ['class' => 'btn btn-primary', 'name' => 'action', 'value' => 'apply']) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'name' => 'action', 'value' => 'save']) ?>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?></div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'status')->checkbox(['checked' => true]) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'text')->widget(Widget::class, [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'table',
                        'imagemanager',
                        'filemanager',
                        'video'

                    ],
                    'imageManagerJson' => Url::to(['/admin/dashboard/images-get']),
                    'imageUpload' => Url::to(['/admin/dashboard/image-upload']),
                    'fileManagerJson' => Url::to(['/admin/dashboard/files-get']),
                    'fileUpload' => Url::to(['/admin/dashboard/file-upload'])
                ]
            ]) ?>
        </div>
      </div>

    </div>
  </div>

    <?php ActiveForm::end(); ?>
</div>
