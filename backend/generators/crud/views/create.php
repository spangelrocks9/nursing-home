<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="panel panel-danger">
        
        <div class="panel-heading">
        	<h4 class="panel-title"><i class="fa fa-plus"></i> <?= "<?= " ?>Html::encode($this->title) ?></h4>
        </div>

        <div class="panel-body <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create">
        	<?= "<?= " ?>$this->render('_form', [
        	    'model' => $model,
        	]) ?>
        </div>

    </div>
</div>