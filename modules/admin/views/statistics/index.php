<?php
/**
 * @var \yii\web\View $this
 * @var array $statistics
 * @var \yii\base\DynamicModel $model
 */

$this->title = 'Статистика';

use yii\bootstrap\ActiveForm;
use yii\helpers\Html; ?>

<div class="row">
  <div class="col-md-12">
      <?php $form = ActiveForm::begin() ?>
    <div class="box">
      <div class="box-header with-border"><h3 class="box-title">Фильтр</h3></div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-2">
              <?= $form->field($model, 'date_start')->textInput()->label('Дата С')->hint('Формат: ДД-ММ-ГГГГ') ?>
          </div>
          <div class="col-md-2">
              <?= $form->field($model, 'date_end')->textInput()->label('Дата По')->hint('Формат: ДД-ММ-ГГГГ') ?>
          </div>
        </div>
      </div>
      <div class="box-footer">
          <?= Html::submitButton('Применить', ['class' => 'btn btn-primary', 'name' => 'action', 'value' => 'apply']) ?>
          <?= Html::submitButton('Сделать рассылку админам', ['class' => 'btn btn-warning pull-right', 'name' => 'action', 'value' => 'send']) ?>
      </div>
    </div>
      <?php ActiveForm::end(); ?>
  </div>
</div>

<div class="row">
    <?php if ($statistics['newTracks']) { ?>
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border"><h3 class="box-title">Новые песни</h3></div>
          <div class="box-body"><?= $statistics['newTracks'] ?></div>
        </div>
      </div>
    <?php } ?>
    <?php if ($statistics['requestedTracks']) { ?>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border"><h3 class="box-title">Топ 5 заказываемых песен</h3></div>
          <div class="box-body">
            <ul class="list-group">
                <?php foreach ($statistics['requestedTracks'] as $requestedTrack) { ?>
                  <li class="list-group-item"><?= $requestedTrack['artist']['name'] ?>
                    - <?= $requestedTrack['track']['title'] ?><span class="badge"><?= $requestedTrack['count'] ?></span>
                  </li>
                <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if ($statistics['requesters']) { ?>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border"><h3 class="box-title">Топ 5 активных заказчиков песен</h3></div>
          <div class="box-body">
            <ul class="list-group">
                <?php foreach ($statistics['requesters'] as $requester) { ?>
                  <li class="list-group-item"><?= $requester['user']['username'] ?> <span
                        class="badge"><?= $requester['count'] ?></span></li>
                <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if ($statistics['likers']) { ?>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Топ 5 лайкеров</h3>
          </div>
          <div class="box-body">
            <ul class="list-group">
                <?php foreach ($statistics['likers'] as $liker) { ?>
                  <li class="list-group-item"><?= $liker['user']['username'] ?> <span
                        class="badge"><?= $liker['count'] ?></span></li>
                <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if ($statistics['dislikers']) { ?>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Топ 5 дизлайкеров</h3>
          </div>
          <div class="box-body">
            <ul class="list-group">
                <?php foreach ($statistics['dislikers'] as $disliker) { ?>
                  <li class="list-group-item"><?= $disliker['user']['username'] ?> <span
                        class="badge"><?= $disliker['count'] ?></span></li>
                <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if ($statistics['likedTracks']) { ?>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Топ 5 песен по лайкам</h3>
          </div>
          <div class="box-body">
            <ul class="list-group">
                <?php foreach ($statistics['likedTracks'] as $likedTrack) { ?>
                  <li class="list-group-item"><?= $likedTrack['artist']['name'] ?>
                    - <?= $likedTrack['track']['title'] ?>
                    <span class="badge"><?= $likedTrack['count'] ?></span></li>
                <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if ($statistics['moreOftenTracks']) { ?>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Топ 5 самых проигрываемых песен</h3>
          </div>
          <div class="box-body">
            <ul class="list-group">
                <?php foreach ($statistics['moreOftenTracks'] as $moreOftenTrack) { ?>
                  <li class="list-group-item"><?= $moreOftenTrack['artist']['name'] ?>
                    - <?= $moreOftenTrack['track']['title'] ?> <span
                        class="badge"><?= $moreOftenTrack['count'] ?></span>
                  </li>
                <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    <?php } ?>
</div>
