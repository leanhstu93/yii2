<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use iutbay\yii2kcfinder\KCFinderInputWidget;
use frontend\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel">
        <?= $this->render('//element/panel-heading', [
            'name' => 'Tổng quan',
        ]) ?>
        <div class="panel-body container-fluid">
            <?= $form->field($model, 'name')->textInput(['class' => 'js__title form-control'])->label('Tiêu đề') ?>

            <div class="form-group">
                <label>
                    Đường dẫn
                </label>
                <div class="input-group input-group-icon">
                    <?= Html::textInput('Product[seo_name]',$model->seo_name,array('class'=>'js__alias form-control')) ?>

                    <span class="input-group-addon">
                      <span class="checkbox-custom checkbox-default">
                        <input type="checkbox" id="inputCheckbox" class="js__toggle-auto-get-alias" name="inputCheckbox" checked="">
                        <label for="inputCheckbox"></label>
                          Lấy đường dẫn tự động
                      </span>
                    </span>
                </div>
            </div>

            <?= $form->field($model, 'price')->textInput() ?>

            <?= $form->field($model, 'price_sale')->textInput() ?>

            <?= $form->field($model, 'sku')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'brand_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'desc')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                'kcfinder' => true,
            ]);
            ?>

            <?= $form->field($model, 'quantity')->textInput() ?>

            <?= $form->field($model, 'weight')->textInput() ?>

            <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

        </div>
        <?= $this->render('//element/panel-heading', [
            'name' => 'Hình ảnh',
        ]) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'image')->widget(KCFinderInputWidget::className(), [
                'buttonLabel' => 'Chọn hình'
            ]) ?>

        </div>
        <?= $this->render('//element/panel-heading', [
            'name' => 'Trạng thái',
        ]) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'option')->dropDownList(Product::listOption()) ?>

            <?= $form->field($model, 'status')->dropDownList(Product::listStatus()) ?>

        </div>
        <?= $this->render('//element/panel-heading', [
            'name' => 'SEO',
        ]) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Lưu', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
