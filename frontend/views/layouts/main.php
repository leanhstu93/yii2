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

// Get HTTP/HTTPS (the possible values for this vary from server to server)
$myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
// Get domain portion
$myUrl .= '://'.$_SERVER['HTTP_HOST'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?=  Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="<?= Yii::$app->urlManager->createAbsoluteUrl(Yii::$app->request->url) ?>" />
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
