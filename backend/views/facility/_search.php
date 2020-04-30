<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="bank-search">

    <?php $form = ActiveForm::begin([
//         'layout' => 'horizontal',
        'method' => 'get',
    ]); ?>
    
    <div class="row">
        <div class="col-5">
            <?= $form->field($model, 'q')->textInput(['placeholder' => 'Enter patient name or room number'])->label('Search Patient');?>
        </div>
        <div class="col-2">
            <br><?= Html::submitButton(Yii::t('app', 'Go!'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<hr