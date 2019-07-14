<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\models\Product */

$this->title = 'Danh sách sản phẩm';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$viewMsg = 'Xem';
$updateMsg = 'Cập nhật';
$deleteMsg = 'Xóa';
$scrollingTop = 10;
?>

<!-- Page -->
<div class="page">
    <?php echo $this->render("//element/breadcrumb"); ?>
    <div class="panel-body container-fluid">
        <?php echo $this->render("page-aside"); ?>
        <div class="page-main">
            <?php echo $this->render("//element/message"); ?>
            <div class="page-content">
                <?php
                $gridColumns = [
                    ['class' => 'kartik\grid\SerialColumn'],
                    [
                        'attribute' => 'name',
                    ],
                    [
                        'class'=>'kartik\grid\BooleanColumn',
                        'attribute'=>'status',
                        'vAlign'=>'middle',
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'dropdown' => true,
                        'vAlign'=>'middle',
                        'urlCreator' => function($action, $model, $key, $index) { return '#'; },
                        'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip'],
                        'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip'],
                        'deleteOptions'=>['title'=>$deleteMsg, 'data-toggle'=>'tooltip'],
                    ],
                    ['class' => 'kartik\grid\CheckboxColumn']
                ];
                ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' =>$gridColumns,
                    'showPageSummary' => true,
                    'pjax' => true,
                    'striped' => true,
                    'hover' => true,
                    'panel' => ['type' => 'primary', 'heading' => 'Grid Grouping Example'],
                    'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                    'toolbar' =>  [
                        ['content'=>

                            Html::a('<i class="glyphicon glyphicon-plus"></i> Thêm mới', ['create'], [ 'class' => 'btn btn-success', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
                        ],
                    ],
                    'filterModel' => $searchModel,
                ]); ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
