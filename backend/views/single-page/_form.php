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
        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <?= $form->errorSummary($model); ?>

            <?= $form->field($model, 'name')->textInput(['class' => 'js__title form-control','required'])->label('Tiêu đề',['class' => 'required']) ?>

            <div class="form-group">
                <label class="required control-label">
                    Đường dẫn
                </label>
                <div class="input-group input-group-icon">
                    <?= Html::textInput('SinglePage[seo_name]',$model->seo_name,array('class'=>'js__alias form-control')) ?>

                    <span class="input-group-addon">
                      <span class="checkbox-custom checkbox-default">
                        <input type="checkbox" id="inputCheckbox" class="js__toggle-auto-get-alias" name="inputCheckbox" checked="">
                        <label for="inputCheckbox"></label>
                          Lấy đường dẫn tự động
                      </span>
                    </span>
                </div>
                <span class="help-block" id="helpBlock"><?= Html::error($model,'seo_name'); ?></span>
            </div>

            <?= $form->field($model, 'desc')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                'kcfinder' => true,
            ]);
            ?>
            <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

        </div>
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'image',['template' => '{input}',])->widget(KCFinderInputWidget::className(), [
                'buttonLabel' => 'Chọn hình',
                'model' => $model,
            ]) ?>
        </div>
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'active')->dropDownList(Product::listActive()) ?>

        </div>
        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => true]) ?>
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
