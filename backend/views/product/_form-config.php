<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use dosamigos\ckeditor\CKEditorInline;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConfigPage */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="config-page-form">

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
                    <input type="text" class="js__alias form-control" placeholder="Đường dẫn">
                    <span class="input-group-addon">
                      <span class="checkbox-custom checkbox-default">
                        <input type="checkbox" id="inputCheckbox" class="js__toggle-auto-get-alias" name="inputCheckbox" checked="">
                        <label for="inputCheckbox"></label>
                          Lấy đường dẫn tự động
                      </span>
                    </span>
                </div>
            </div>

            <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

            <?php $_SESSION['KCFINDER'] = array(
                'disabled' => 11
            ); ?>
            <?= $form->field($model, 'conten')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'conten')->widget(CKEditor::className(), [
                    'kcfinder' => true,
                ]);
            ?>
        </div>
        <?= $this->render('//element/panel-heading', [
            'name' => 'Trạng thái',
        ]) ?>
        <div class="panel-body container-fluid">
            <?= $form->field($model, 'status')->dropDownList(\frontend\models\ConfigPage::listStatus()) ?>
        </div>
        <?= $this->render('//element/panel-heading', [
            'name' => 'SEO',
        ]) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'meta_title')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'meta_desc')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'meta_keyword')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>