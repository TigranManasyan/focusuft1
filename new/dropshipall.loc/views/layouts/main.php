<?php

use app\assets\AppAsset;
use app\helpers\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->head() ?>
</head>
<?php $this->beginBody();?>
<?= $this->render('header');?>
<?= $content?>
<?= $this->render('footer');?>
<?= $this->render('/modals/default', ['title' => Modal::getTitle(), 'body' => Modal::getBody()]) ?>
<?= $this->render('modals') ?>
<?php $this->endBody();?>

</html>
<?php $this->endPage();?>

