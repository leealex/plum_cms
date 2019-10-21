<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
$user = Yii::$app->user->identity;

dmstr\web\AdminLteAsset::register($this);
$bundle = admin\AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <link rel="shortcut icon" href="<?= $bundle->baseUrl ?>/img/favicon.ico"/>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <?php
    echo $this->render('header', ['user' => $user, 'adminImg' => $bundle->baseUrl]);
    echo $this->render('left', ['user' => $user, 'adminImg' => $bundle->baseUrl]);
    echo $this->render('content', ['content' => $content]);
    ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

