<?php
/**
 * @var $user \app\modules\admin\models\User
 * @var $adminImg string
 */

?>
<aside class="main-sidebar">
  <section class="sidebar">
      <?= dmstr\widgets\Menu::widget([
          'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
          'items' => [
              ['label' => 'Главная', 'icon' => 'home', 'url' => ['dashboard/index']],
              ['label' => 'Контент', 'icon' => 'file-text', 'url' => '#', 'items' => [
                  ['label' => 'Категории', 'icon' => 'list', 'url' => ['category/index'], 'active' => $this->context->id === 'category'],
                  ['label' => 'Статьи', 'icon' => 'file-text', 'url' => ['article/index'], 'active' => $this->context->id === 'article'],
                  ['label' => 'Новости', 'icon' => 'file-text', 'url' => ['news/index'], 'active' => $this->context->id === 'news'],
                  ['label' => 'Текстовые блоки', 'icon' => 'file-text-o', 'url' => ['text-block/index'], 'active' => $this->context->id === 'text-block'],
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
