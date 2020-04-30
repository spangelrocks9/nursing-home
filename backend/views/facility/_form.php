<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Url;
use kartik\number\NumberControl;
use common\helpers\CommonHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Vendor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendor-form">

    <?php $form = ActiveForm::begin(); ?>

    
        <?php
            echo $form->field($model, 'bank_id')->widget(Select2::classname(), [
                'data' => backend\models\Bank::dropDown(),
                'options' => ['placeholder' => Yii::t('app', '--- Select Bank---')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    'change' => 'function() { 
                        $.get( "'.Url::toRoute('/bank/cheques').'", {id: $(this).val()} )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'cheque_id').'" ).html( data );
                            }
                        );
                    }',
                ],
            ]);
        ?>
    
        <?php
            echo $form->field($model, 'cheque_id')->widget(Select2::classname(), [
                    'data' => null,//backend\models\ChequeEntry::activeDropDown(),
                    'options' => ['placeholder' => Yii::t('app', '--- Select Cheque No---')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
            ]);
        ?>

        <?php
            echo $form->field($model, 'vendor_id')->widget(Select2::classname(), [
                    'data' => backend\models\Vendor::dropDown(),
                    'options' => ['placeholder' => Yii::t('app', '--- Select Vendor ---')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
            ]);
        ?>
    
        <?php
            echo $form->field($model, 'amount')->widget(NumberControl::classname(), [
            'maskedInputOptions' => [
                'allowMinus' => false
            ],
            'displayOptions' => ['class' => 'form-control kv-monospace'],
            'saveInputContainer' => ['class' => 'kv-saved-cont'],
        ]);?>
        
        <div class="date-field">
            <?=$form->field($model, 'cheque_date_np',['template' => '{label}{input}<button type="button" class="ui-datepicker-trigger" onclick="showNdpCalendarBox(\'chequeprint-cheque_date_np\');"><img src="'.Url::to("@web/images/calendar.gif").'" alt="..." title="..."></button>{error}{hint}'])->textInput(['readonly' => true]);?>
            <div class="hide"><?= $form->field($model, 'cheque_date')->hiddenInput()->label(false); ?></div>
        </div>

        <?= $form->field($model, 'remarks')->textInput();?>
        
        <?php
            /*echo $form->field($model, 'cheque_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Cheque Date'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);*/?>

        <?php echo $form->field($model, 'font_size')->dropDownList(CommonHelper::fontsize_dd()); ?>
        <?php echo $form->field($model, 'font_family')->dropDownList(CommonHelper::fontfamily_dd()); ?>     
        <?php echo $form->field($model, 'template')->dropDownList(['1' => 'Without Slip', '2' => 'With Slip']); ?>      

    <div class="row">
      	<div class="col-md-2 col-xs-6">
        	<?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-block']) ?>
    	</div>

    	<div class="col-md-2 col-xs-6">
    		<?= Html::resetButton(Yii::t('app', 'Cancel'), ['class' => 'btn btn-danger btn-block'])?>
    	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
$this->registerCssFile('@web/css/nepali.datepicker.v2.2.min.css');
$this->registerJsFile('@web/js/nepali.datepicker.v2.2.min.js', ['depends' => [\backend\assets\AppAsset::className()]]);
$script = "
    $(function(){

        $('#chequeprint-cheque_date_np').nepaliDatePicker({
          npdMonth: true,
          npdYear: true,
          onChange: function(){
            $('#chequeprint-cheque_date').val(BS2AD($('#chequeprint-cheque_date_np').val()));
          }
        });

    });

    ";
$this->registerJs($script,\yii\web\View::POS_END,'npdate');
?>