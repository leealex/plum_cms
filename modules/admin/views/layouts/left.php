<?php
/**
 * @var $user \app\modules\admin\models\User
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
              ['label' => 'Контент', 'icon' => 'file-text', 'url' => '#', 'items' => [
                  ['label' => 'Категории', 'icon' => 'list', 'url' => ['category/index']],
                  ['label' => 'Статьи', 'icon' => 'file-text', 'url' => ['article/index']],
                  ['label' => 'Новости', 'icon' => 'file-text', 'url' => ['news/index']],
                  ['label' => 'Текстовые блоки', 'icon' => 'file-text-o', 'url' => ['text-block/index']],
              ]],
              ['label' => 'Менеджер файлов', 'icon' => 'image', 'url' => ['/admin/file-manager']],
              ['label' => 'Пользователи', 'icon' => 'users', 'url' => ['/admin/user']],
              ['label' => 'Настройки', 'icon' => 'wrench', 'url' => ['/admin/settings']],
              ['label' => 'Система', 'icon' => 'cogs', 'url' => '#', 'items' => [
                  ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                  ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                  ['label' => 'Журнал событий', 'icon' => 'tasks', 'url' => ['/admin/log']],
              ]]
          ]
      ]) ?>
    <div class="sidebar-footer">
      Powered by Plum
    </div>
  </section>
</aside>
