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
    <div class="col-md-6"><?php echo $form->field($model, 'note')->textarea(array('rows'=>4,'cols'=>4)); ?></div>
    <div class="col-md-2">
        <?php echo $form->field($model, 'datetime')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter date ...'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'orientation' => "top",
            ]
        ]); ?>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-2">
            <?= Html::submitButton(Yii::t('app', 'Save and exit'), ['class' => 'btn btn-success btn-block','value' =>
                'submit','name' => 'submit1']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>