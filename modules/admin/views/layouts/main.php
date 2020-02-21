<?php

use admin\AdminAsset;
use dmstr\web\AdminLteAsset;
use yii\helpers\Html;

/**
 * @var $this \yii\web\View
 * @var $content string
 */

$user = Yii::$app->user->identity;

AdminLteAsset::register($this);
AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <link rel="shortcut icon" href="/images/cp/favicon.ico"/>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <?php
    echo $this->render('header', ['user' => $user]);
    echo $this->render('left');
    echo $this->render('content', ['content' => $content]);
    ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

