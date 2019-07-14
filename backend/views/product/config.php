<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Cấu hình trang sản phẩm';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Page -->
<div class="page">
	<?php echo $this->render("//element/breadcrumb"); ?>
	<div class="panel-body container-fluid">
        <?php echo $this->render("page-aside"); ?>
        <div class="page-main">
            <div class="page-header">
                <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="page-content">
                <?= $this->render('_form-config', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
	</div>
</div>
<!-- End Page -->
