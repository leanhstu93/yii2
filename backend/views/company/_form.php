<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use iutbay\yii2kcfinder\KCFinderInputWidget;
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

            <?= $form->field($model, 'name')->textInput(['class' => 'form-control']) ?>

            <?= $form->field($model, 'address')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'favicon',['template' => '{label}{input}',])->widget(KCFinderInputWidget::className(), [
                'buttonLabel' => 'Chọn hình',
                'model' => $model,
            ]) ?>

            <?= $form->field($model, 'logo',['template' => '{label}{input}',])->widget(KCFinderInputWidget::className(), [
                'buttonLabel' => 'Chọn hình',
                'model' => $model,
            ]) ?>

            <?= $form->field($model, 'email')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'fax')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'tel')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'phone')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'facebook')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'twitter')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'google')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'youtube')->textInput(['class' => 'form-control'])?>

        </div>

        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">

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
