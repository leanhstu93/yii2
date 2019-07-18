<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Page -->
<div class="page">
    <?php echo $this->render("//element/breadcrumb"); ?>
    <div class="panel-body container-fluid">
        <?php echo $this->render("page-aside", ['data' => [
            [
                'name' => 'Tổng quan',
                'link' => 'js__overview',
                'icon' =>'icon wb-dashboard'
            ],
            [
                'name' => 'Hình ảnh',
                'link' => 'js__image',
                'icon' =>'icon wb-image'
            ],
            [
                'name' => 'Trạng thái',
                'link' => 'js__status',
                'icon' =>'icon wb-heart'
            ],
            [
                'name' => 'SEO',
                'link' => 'js__seo',
                'icon' =>'icon fa-google-plus'
            ],

        ]]); ?>
        <div class="page-main">
            <?php echo $this->render("//element/message"); ?>
            <div class="page-header">
                <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="page-content">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->

