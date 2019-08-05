<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tin tức';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'seo_name',
            'category_id',
            'order',
            //'image',
            //'desc:ntext',
            //'content:ntext',
            //'alias',
            //'tags',
            //'user_id',
            //'date_create',
            //'date_update',
            //'count_view',
            //'meta_title',
            //'meta_desc',
            //'meta_keyword',
            //'active',
            //'option',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
