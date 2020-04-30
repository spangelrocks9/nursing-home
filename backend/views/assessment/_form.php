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
    <div class="col-md-12"><?= $form->field($model, 'detail1')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-12"><?php echo $form->field($model, 'detail2')->dropDownList(['1' => 'Option1','2' => 'Option 2']); ?></div>
    <div class="col-md-12"><?php echo $form->field($model, 'detail3')->checkboxList(
            ['a' => 'Item A', 'b' => 'Item B', 'c' => 'Item C']
        );
        ?></div>
    <hr>
    <div class="row">
        <div class="col-md-4 col-xs-6">
            <?= Html::submitButton(Yii::t('app', 'Save and exit'), ['class' => 'btn btn-success btn-block','value' =>
            'submit','name' => 'submit1']) ?>
        </div>

        <div class="col-md-4 col-xs-6">
            <?= Html::submitButton(Yii::t('app', 'Mark as completed'), ['class' => 'btn btn-danger btn-block','value' => 'completed','name' => 'submit2']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>