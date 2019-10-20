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
              ['label' => 'Контент', 'encode' => false, 'icon' => 'file-text', 'url' => ['/admin/content']],
              ['label' => 'Пользователи', 'icon' => 'users', 'url' => ['/admin/user']],
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
