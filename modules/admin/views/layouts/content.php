<?php

use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

/**
 * @var $content string
 * @var $this \yii\web\View
 */
?>
<div class="content-wrapper">
  <section class="content-header">
      <?php if (isset($this->blocks['content-header'])) { ?>
        <h1><?= $this->blocks['content-header'] ?></h1>
      <?php } else { ?>
        <h1>
            <?php
            if ($this->title !== null) {
                echo Html::encode($this->title);
            } else {
                echo Inflector::camel2words(Inflector::id2camel($this->context->module->id));
                echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
            } ?>
        </h1>
      <?php } ?>

      <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
  </section>

  <section class="content">
      <?= Alert::widget() ?>
      <?= $content ?>
  </section>
</div>

<footer class="main-footer">
  Copyright &copy; <?= date('Y') ?> <a href="http://plumy.ru">Plum</a> - Разработка и сопровождение сайтов.
</footer>