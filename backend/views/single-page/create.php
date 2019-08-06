<?php

use frontend\models\SinglePage;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\SinglePage */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Trang đơn', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$menu =  [
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
    [
        'name' => 'Lưu',
        'link' => 'js__save',
        'icon' =>'fa fa-hand-grab-o'
    ],
];
?>


<!-- Page -->
<div class="page">
    <div class="panel-body container-fluid">
        <?php echo $this->render("page-aside",['data' =>$menu]); ?>
        <div class="page-main ">
            <?php echo $this->render("//element/message"); ?>
            <div class="page-content css_page-main">
                <?php echo $this->render("//element/breadcrumb"); ?>
                <?= $this->render('_form', [
                    'model' => $model,
                    'menu' => array_reverse($menu),
                ]) ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->

