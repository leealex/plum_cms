<?php
/**
 * @var $user \app\models\User
 * @var $adminImg string
 */

use yii\helpers\Html;

?>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= $adminImg ?>/img/avatar.png" class="img-circle" alt="User Image"/>
      </div>
      <div class="pull-left info">
        <p><?= $user->username ?></p>
        <p><?= Html::a('Выход', ['/admin/dashboard/logout'], ['data-method' => 'post']) ?></p>
      </div>
    </div>
      <?= dmstr\widgets\Menu::widget([
          'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
          'items' => [
              ['label' => 'Главная', 'icon' => 'home', 'url' => ['/admin/dashboard']],
              ['label' => 'Контент', 'encode' => false, 'icon' => 'file-text', 'url' => ['/admin/content']],
              ['label' => 'Пользователи', 'icon' => 'users', 'url' => ['/admin/user']],
              ['label' => 'Комменты', 'icon' => 'comment', 'url' => '#', 'options' => ['class' => 'treeview'], 'items' => [
                  ['label' => 'Список', 'icon' => 'list', 'url' => ['/admin/comment']],
                  ['label' => 'Забанены', 'icon' => 'list', 'url' => ['/admin/comment/ban-list']],
              ]],
              ['label' => 'Фонотека', 'icon' => 'music', 'url' => '#', 'options' => ['class' => 'treeview'], 'items' => [
                  ['label' => 'Песни', 'icon' => 'music', 'url' => ['/admin/track']],
                  ['label' => 'Исполнители', 'icon' => 'music', 'url' => ['/admin/track/artists']],
                  ['label' => 'Альбомы', 'icon' => 'music', 'url' => ['/admin/track/albums']],
              ]],
              ['label' => 'Заявки', 'icon' => 'pencil', 'url' => ['/admin/request']],
              ['label' => 'Стоп-лист заявок', 'icon' => 'ban', 'url' => ['/admin/request-stop']],
              ['label' => 'Оценки', 'icon' => 'thumbs-up', 'url' => ['/admin/rating']],
              ['label' => 'Статистика', 'icon' => 'bar-chart', 'url' => ['/admin/statistics']],
              ['label' => 'Настройки', 'encode' => false, 'icon' => 'wrench', 'url' => ['/admin/settings']],
              ['label' => 'Система', 'icon' => 'cogs', 'url' => '#', 'options' => ['class' => 'treeview'], 'items' => [
                  ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                  ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                  ['label' => 'Журнал событий', 'encode' => false, 'icon' => 'tasks', 'url' => ['/admin/log']],
              ]]
          ]
      ]) ?>
  </section>
</aside>
