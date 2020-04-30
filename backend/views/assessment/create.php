<?php
use yii\helpers\Html;
$this->title = Yii::t('app', 'Assessment');
?>

<!--<div class="col-lg-6">-->
    <div class="element-wrapper">
        <div class="element-box">

            <?php echo $this->render('/patient/_patient',['model' => $patient]);?>

            <h6 class="element-header"><?=$this->title;?></h6>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
<!--    </div>-->
</div>