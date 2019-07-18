<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'sku',
            'brand_name',
            'desc:ntext',
            'content:ntext',
            //'tags',
            //'count_view',
            //'user_id',
            //'date_update',
            //'seo_name',
            //'target_blank',
            //'image',
            //'option',
            //'quantity',
            //'weight',
            //'price',
            //'price_sale',
            //'status',
            //'meta_title',
            //'meta_desc',
            //'meta_keyword',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
