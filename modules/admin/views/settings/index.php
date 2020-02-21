<?php

use app\modules\admin\widgets\SettingsAsset;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/**
 * @var $this yii\web\View
 * @var $settings \app\modules\admin\models\Settings[]
 */

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;

SettingsAsset::register($this);
?>
<div class="settings-index">
    <?php $form = ActiveForm::begin(); ?>
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::button('Добавить настройку', ['id' => 'add-row', 'class' => 'btn btn-primary']) ?>
    </div>
    <div class="panel-body">
      <table class="settings-table table table-bordered table-responsive table-hover">
        <tr>
          <th style="width:300px;text-align:center">Код</th>
          <th style="width:500px;text-align:center">Значение</th>
          <th style="text-align:center">Комментарий</th>
          <th style="width:90px;text-align:center">Удалить</th>
        </tr>
          <?php foreach ($settings as $index => $setting) { ?>
              <?php $disabled = $setting->editable === 0 ? ['disabled' => 'disabled'] : []; ?>
            <tr>
              <td><?= $form->field($setting, "[$index]key")->textInput($disabled)->label(false) ?></td>
              <td><?= $form->field($setting, "[$index]value")->textInput()->label(false) ?></td>
              <td><?= $form->field($setting, "[$index]comment")->textInput($disabled)->label(false) ?></td>
              <td><?= $disabled ? '' : Html::button('Удалить', ['id' => $index, 'class' => 'btn btn-danger delete-row']) ?></td>
            </tr>
          <?php } ?>
      </table>
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
