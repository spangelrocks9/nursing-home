<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bank */

$this->title = Yii::t('app', 'Add New Patient');
?>
<div class="col-lg-6">
    <div class="element-wrapper">
        <div class="element-box">
            <h6 class="element-header"><?=$this->title;?></h6>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>