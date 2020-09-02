<?php

use app\modules\admin\models\News;
use app\modules\admin\widgets\ButtonGroup;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/**
 * @var $this yii\web\View
 * @var $model News
 * @var $form yii\widgets\ActiveForm
 */
?>

<div class="content-form">
    <?php $form = ActiveForm::begin(); ?>
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::submitButton('Применить', ['class' => 'btn btn-primary', 'name' => 'action', 'value' => 'apply']) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'name' => 'action', 'value' => 'save']) ?>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?></div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'status')->widget(ButtonGroup::class, [
                'default' => 1,
                'items' => [['label' => 'Опубликовано', 'value' => 1], ['label' => 'Не опубликовано', 'value' => 0]]
            ])->label(false) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'text')->widget(CKEditor::class, [
                'editorOptions' => ElFinder::ckeditorOptions('admin/elfinder', ['preset' => 'standard']),
            ]) ?>
          <div class="well">
            В тексте можно использовать шорткоды для вставки мадиа-блоков (галереи, географические карты и т.д.).
            Шорткод должен быть заключен в двойные фигурные кавычки, например: <strong>{{code}}</strong>. Доступны
            следующие коды:
            <ul>
              <li><strong>{{map_contacts}}</strong> - Карта с контактами</li>
              <li><strong>{{map_object}}</strong> - Карта с объектами</li>
              <li><strong>{{gallery:folder}}</strong> - Фотогалерея. После двоеточия вместо <strong>folder</strong>
                нужно подставить имя папки, например: <strong>{{gallery:glavnii_korpus}}</strong>. В именах файлов можно
                использовать только латинские буквы, тире и подчеркивания, без пробелов. Папки с новыми галереями
                создаются внутри папки <strong>gallery</strong>.
              </li>
            </ul>
          </div>
            <?= ElFinder::widget([
                'language' => 'ru',
                'controller' => 'admin/elfinder',
                'filter' => 'image',
                'containerOptions' => ['style' => 'height:500px']
            ]) ?>
        </div>
      </div>
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
