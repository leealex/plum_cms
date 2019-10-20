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
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Панель управления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-default-index">
  <div class="row">
    <div class="col-md-4">
      <div class="small-box bg-aqua-gradient">
        <div class="inner">
          <h3>0</h3>
          <p>Песен</p>
        </div>
        <div class="icon">
          <i class="fa fa-music"></i>
        </div>
        <a href="/admin/track" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="small-box bg-red-gradient">
        <div class="inner">
          <h3>0</h3>
          <p>Исполнителей</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="/admin/track/artists" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="small-box bg-purple-gradient">
        <div class="inner">
          <h3>0</h3>
          <p>Альбомов</p>
        </div>
        <div class="icon">
          <i class="fa fa-folder"></i>
        </div>
        <a href="/admin/track/albums" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="small-box bg-yellow-gradient">
        <div class="inner">
          <h3>0</h3>
          <p>Пользователей</p>
        </div>
        <div class="icon">
          <i class="fa fa-group"></i>
        </div>
        <a href="/admin/user" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="small-box bg-blue-gradient">
        <div class="inner">
          <h3>0</h3>
          <p>Комментариев</p>
        </div>
        <div class="icon">
          <i class="fa fa-pencil"></i>
        </div>
        <a href="/admin/comment" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="small-box bg-green-gradient">
        <div class="inner">
          <h3>0</h3>
          <p>Оценок</p>
        </div>
        <div class="icon">
          <i class="fa fa-thumbs-up"></i>
        </div>
        <a href="/admin/rating" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
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
