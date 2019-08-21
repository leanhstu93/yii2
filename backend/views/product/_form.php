<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use iutbay\yii2kcfinder\KCFinderInputWidget;
use frontend\models\Product;
use frontend\models\DataLang;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
/* @var $dataLang app\models\DataLang */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' =>['class' => 'js-form']]); ?>
    <div class="panel">
        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <div class="css-tab-language js-tab-language js-tab-language-vi" data-code="vi">

                <?= $form->field($model, 'category_ids')->dropDownList($listCate,[
                    'class' => 'form-control js__init-select-sumo',
                    'multiple' => true,
                    ])->label('Danh mục') ?>

                <?= $form->field($model, 'name')->textInput(['class' => 'js__title form-control','required'])->label('Tiêu đề',['class' => 'required']) ?>

                    <div class="form-group">
                        <label class="required control-label">
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
        <?php
            $dataFieldLang = [
               [
                   'type' => 'text',
                   'name' => 'name',
                   'required' => 'required',
                   'class' => 'required'
               ],
                [
                    'type' => 'text',
                    'name' => 'seo_name',
                    'required' => 'required',
                    'class' => 'required'
                ],
                [
                    'type' => 'textarea',
                    'name' => 'desc',
                    'required' => '',
                    'class' => ''
                ],
                [
                    'type' => 'textarea',
                    'name' => 'content',
                    'required' => '',
                    'class' => ''
                ],
            ] ;
            ?>
            <?= $this->render('_form-lang',['model' => $dataLang,'dataFieldLang' => $dataFieldLang,'form' => $form])  ?>

        </div>
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <?= $form->field($model, 'images',['template' => '{input}',])->widget(KCFinderInputWidget::className(), [
                'buttonLabel' => 'Chọn hình',
                'multiple' => true,
                'model' => $model,
            ]) ?>
        </div>
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'option')->dropDownList(Product::listOption()) ?>

            <?= $form->field($model, 'active')->dropDownList(Product::listActive()) ?>

        </div>
        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <div class="css-tab-language js-tab-language js-tab-language-vi">
                <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => true]) ?>
            </div>
            <?php
            $dataFieldLang = [
                [
                    'type' => 'text',
                    'name' => 'meta_title',
                    'required' => '',
                    'class' => ''
                ],
                [
                    'type' => 'text',
                    'name' => 'meta_desc',
                    'required' => '',
                    'class' => ''
                ],
                [
                    'type' => 'text',
                    'name' => 'meta_keyword',
                    'required' => '',
                    'class' => ''
                ],
            ] ;
            ?>
            <?= $this->render('_form-lang',['model' => $dataLang,'dataFieldLang' => $dataFieldLang,'form' => $form])  ?>
        </div>
        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <div class="form-group">
                <?= Html::submitButton('Lưu', ['class' => 'btn btn-primary js-submit']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
