<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Cấu hình trang sản phẩm';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/babel" src="<?php echo Yii::$app->homeUrl
?>app/product/create_product.component.js"></script>
<script type="text/babel" src="<?php echo Yii::$app->homeUrl
?>app/main.component.js?v=<?= time() ?>"></script>
<!-- Page -->
<div class="page" id="content">
	<?php echo $this->render("//element/breadcrumb"); ?>
	<div class="panel-body container-fluid">

	    <h1><?= Html::encode($this->title) ?></h1>

	</div>
</div>
<!-- End Page -->
