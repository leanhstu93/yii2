<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use frontend\models\ProductCategory;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel">
        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <?= $form->field($model, 'category_id')->dropDownList($listCate,[
                'class' => 'form-control',
            ])->label('Danh mục') ?>
            <?= $form->field($model, 'name')->textInput(['class' => 'js__title form-control'])->label('Tiêu đề') ?>

            <?= $form->field($model, 'link')->textInput(['class' => 'js__title form-control'])?>

            <?= $form->field($model, 'desc')->widget(CKEditor::className(), [
                'kcfinder' => true,
            ]); ?>

            <?= $form->field($model, 'content')->widget(CKEditor::className(), [
            ]);
            ?>
        </div>
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'image',['template' => '<div class="input-group input-group-file js__select-image">{input}<span class="input-group-btn">
                      <span class="btn btn-success btn-file">
                        <i class="icon wb-upload" aria-hidden="true"></i>
                       
                      </span>
                    </span></div>'], [
                'buttonLabel' => 'Chọn hình',
                'model' => $model,
            ])->textInput(['class' => 'js__image-value form-control']) ?>

        </div>

        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'active')->dropDownList(ProductCategory::listActive()) ?>

        </div>
        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <div class="form-group">
                <?= Html::submitButton('Lưu', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
