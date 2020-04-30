<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bank */

$this->title = Yii::t('app', 'Create Bank');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Banks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="panel panel-danger">
        
        <div class="panel-heading">
        	<h4 class="panel-title"><i class="fa fa-plus"></i> <?= Html::encode($this->title) ?></h4>
        </div>

        <div class="panel-body bank-create">
        	<?= $this->render('_form', [
        	    'model' => $model,
        	]) ?>
        </div>

    </div>
</div>