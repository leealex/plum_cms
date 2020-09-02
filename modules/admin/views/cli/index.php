<?php

/**
 * @var $this \yii\web\View
 */

$this->title = 'CLI Commands';
?>

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-body">
        <a href="/admin/cli/git-status" class="btn btn-success">Git Status</a>
        <a href="/admin/cli/git-pull" class="btn btn-primary">Git Pull</a>
        <a href="/admin/cli/composer-install" class="btn btn-primary">Composer Install</a>
        <a href="/admin/cli/git-hard-pull" class="btn btn-danger">Git Hard Pull</a>
        <a href="/admin/cli/composer-update" class="btn btn-danger">Composer Update</a>
      </div>
    </div>
  </div>
</div>
