<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use iutbay\yii2kcfinder\KCFinderInputWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConfigPage */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="config-page-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel">
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <?= $form->field($model, 'name')->textInput(['class' => 'js__title form-control'])->label('Tiêu đề') ?>
            <div class="form-group">
                <label>
                    Đường dẫn
                </label>
                <div class="input-group input-group-icon">
                    <?= Html::textInput('ConfigPage[seo_name]',$model->seo_name,array('class'=>'js__alias form-control')) ?>
                    <span class="input-group-addon">
                      <span class="checkbox-custom checkbox-default">
                        <input type="checkbox" id="inputCheckbox" class="js__toggle-auto-get-alias" name="inputCheckbox" checked="">
                        <label for="inputCheckbox"></label>
                          Lấy đường dẫn tự động
                      </span>
                    </span>
                </div>
            </div>

            <?= $form->field($model, 'desc')->textarea(['rows' => 3]) ?>
        </div>
            <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
            <div class="panel-body container-fluid">
            <?= $form->field($model, 'image')->widget(KCFinderInputWidget::className(), [
            'buttonLabel' => 'Chọn hình'
            ]) ?>
            <?= $form->field($model, 'conten')->widget(CKEditor::className(), [
                    'kcfinder' => true,
                ]);
            ?>
        </div>
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <?= $form->field($model, 'status')->dropDownList(\frontend\models\ConfigPage::listStatus()) ?>
        </div>
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'meta_title')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'meta_desc')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'meta_keyword')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Lưu', [ 'name' => 'aa' , 'class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>