<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConfigPage */

$this->title = 'Create Config Page';
$this->params['breadcrumbs'][] = ['label' => 'Config Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
