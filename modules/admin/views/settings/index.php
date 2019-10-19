<?php

use app\modules\admin\widgets\Settings;

/* @var $this yii\web\View */
/* @var $settings \app\models\Settings[] */

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-index">
  <div class="panel panel-default">
    <div class="panel-body">
        <?= Settings::widget(['settings' => $settings])?>
    </div>
  </div>
</div>
