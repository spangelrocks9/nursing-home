<?php

use backend\models\Facility;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendor-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12"><?php echo $form->field($model, 'facility_id')->dropDownList(Facility::dropdown()); ?></div>
    <div class="col-md-12"><?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-12"><?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-12"><?php echo $form->field($model, 'sex')->dropDownList(['Male' => 'Male', 'Female' => 'Female']); ?></div>
    <div class="col-md-12">
        <?php echo $form->field($model, 'date_of_birth')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter birth date ...'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'orientation' => "bottom",
            ]
        ]); ?>
    </div>
    <div class="col-md-12">
        <?php echo $form->field($model, 'date_of_admission')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter admission date ...'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'orientation' => "bottom",
            ]
        ]); ?>
    </div>
    <div class="col-md-12"><?= $form->field($model, 'room_number')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-12"><?= $form->field($model, 'unit_name')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-12">
        <?= $form->field($model, 'image')->fileInput(); ?>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-2 col-xs-6">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-block']) ?>
        </div>

        <div class="col-md-2 col-xs-6">
            <?= Html::resetButton(Yii::t('app', 'Cancel'), ['class' => 'btn btn-danger btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>