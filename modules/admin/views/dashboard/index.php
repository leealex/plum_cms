<?php

/**
 * @var $this yii\web\View
 * @var $bestTracks \yii\data\ActiveDataProvider
 * @var $worstTracks \yii\data\ActiveDataProvider
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $counters array
 * @var $statistics array
 */

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Панель управления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-default-index">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
            <?= Html::a(FA::i('list') . ' Создать категорию', ['category/create'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(FA::i('file-text') . ' Создать статью', ['article/create'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(FA::i('file-text') . ' Создать новость', ['news/create'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(FA::i('file-text-o') . ' Создать текстовый блок', ['text-block/create'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(FA::i('user') . ' Создать пользователя', ['user/create'], ['class' => 'btn btn-primary']) ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Информация о системе</h3>
          <div class="box-tools pull-right">
            <span class="label label-primary"> <i class="fa fa-info-circle"></i> </span>
          </div><!-- /.box-tools -->
        </div>
        <div class="box-body">
          <ul class="list-group">
            <li class="list-group-item">Версия фреймворка <code><?= Yii::getVersion() ?></code></li>
            <li class="list-group-item">Версия PHP <code><?= phpversion() ?></code></li>
            <li class="list-group-item">Размер диска
              <code><?= round(disk_total_space(Yii::$app->basePath) / 1024 / 1024 / 1024) ?>
                Gb</code></li>
            <li class="list-group-item">Свободное место на диске
              <code><?= round(disk_free_space(Yii::$app->basePath) / 1024 / 1024 / 1024) ?> Gb</code></li>
          </ul>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
    <div class="col-md-6">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Последние системные сообщения</h3>
          <div class="box-tools pull-right">
            <span class="label label-primary"> <i class="fa fa-tasks"></i> </span>
          </div><!-- /.box-tools -->
        </div>
        <div class="box-body">
          <ul class="list-group">
              <?= ListView::widget([
                  'dataProvider' => $dataProvider,
                  'itemView' => '_message',
                  'itemOptions' => [
                      'tag' => false
                  ],
                  'layout' => '{items}'
              ]) ?>
          </ul>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</div>
