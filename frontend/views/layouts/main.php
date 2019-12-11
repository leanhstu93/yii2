<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>
    <?php echo $this->render("//element/header"); ?>
        <?= Alert::widget() ?>
    <?php echo $this->render("//element/message"); ?>
        <?= $content ?>
    <?php echo $this->render("//element/footer"); ?>
</div>


<?php echo  \Yii::$app->view->render('@app/views/modal/form-advisory'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
