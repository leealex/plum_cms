<?php

/**
 * @var $this yii\web\View
 * @var $bestTracks \yii\data\ActiveDataProvider
 * @var $worstTracks \yii\data\ActiveDataProvider
 * @var $log \app\modules\admin\models\SystemLog[]
 * @var $counters array
 * @var $statistics array
 */

use app\modules\admin\models\Article;
use app\modules\admin\models\News;
use app\modules\admin\models\User;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Панель управления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-default-index">
  <div class="row">

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= User::find()->count() ?></h3>
          <p>Пользователей</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
          <?= Html::a('Все пользователи <i class="fa fa-arrow-circle-right"></i>', ['user/index'], ['class' => 'small-box-footer']); ?>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= Article::find()->count() ?></h3>
          <p>Статей</p>
        </div>
        <div class="icon">
          <i class="fa fa-file-text"></i>
        </div>
          <?= Html::a('Все статьи <i class="fa fa-arrow-circle-right"></i>', ['article/index'], ['class' => 'small-box-footer']); ?>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= News::find()->count() ?></h3>
          <p>Новостей</p>
        </div>
        <div class="icon">
          <i class="fa fa-file-text"></i>
        </div>
          <?= Html::a('Все новости <i class="fa fa-arrow-circle-right"></i>', ['news/index'], ['class' => 'small-box-footer']); ?>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= Yii::$app->params['logCount'] ?></h3>
          <p>Новых ошибок</p>
        </div>
        <div class="icon">
          <i class="fa fa-exclamation-triangle"></i>
        </div>
          <?= Html::a('Открыть журнал <i class="fa fa-arrow-circle-right"></i>', ['log/index'], ['class' => 'small-box-footer']); ?>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::a(FA::i('list') . ' Создать категорию', ['category/create'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(FA::i('file-text') . ' Создать статью', ['article/create'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(FA::i('file-text') . ' Создать новость', ['news/create'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(FA::i('file-text-o') . ' Создать текстовый блок', ['text-block/create'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(FA::i('user') . ' Создать пользователя', ['user/create'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <h4>Информация о системе</h4>
              <table class="table">
                <tr>
                  <td>Версия Yii2</td>
                  <td><code><?= Yii::getVersion() ?></code></td>
                </tr>
                <tr>
                  <td>Версия PHP</td>
                  <td><code><?= phpversion() ?></code></td>
                </tr>
                <tr>
                  <td>Размер диска</td>
                  <td><code><?= round(disk_total_space(Yii::$app->basePath) / 1024 / 1024 / 1024) ?>
                      Gb</code></td>
                </tr>
                <tr>
                  <td>Свободное место на диске</td>
                  <td><code><?= round(disk_free_space(Yii::$app->basePath) / 1024 / 1024 / 1024) ?> Gb</code></td>
                </tr>
              </table>
            </div>
            <div class="col-md-6">
              <h4>Системный журнал</h4>
              <table class="table">
                  <?php if ($log) { ?>
                      <?php foreach ($log as $record) { ?>
                      <tr>
                        <td><?= Html::encode(date('d.m.Y H:i:s', $record->log_time)) ?></td>
                        <td>
                          <a href="<?= Url::to(['/admin/log/view', 'id' => $record->id]) ?>"><?= Html::encode($record->category) ?></a>
                        </td>
                      </tr>
                      <?php } ?>
                  <?php } else { ?>
                    <tr>
                      <td class="text-muted text-center">Новых записей нет</td>
                    </tr>
                  <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
