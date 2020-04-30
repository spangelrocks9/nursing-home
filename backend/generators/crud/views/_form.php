<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php " ?>$form = ActiveForm::begin([
        'layout' => 'horizontal',
            'fieldConfig'          => [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-4',
                ],
            ],
    ]); ?>

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "<div class=\"col-md-12\"><?= " . $generator->generateActiveField($attribute) . " ?></div>\n\n";
    }
} ?>

    <div class="row">
      	<div class="col-md-2 col-xs-6">
        	<?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Save') ?>, ['class' => 'btn btn-success btn-block']) ?>
    	</div>

    	<div class="col-md-2 col-xs-6">
    		<?= "<?= " ?>Html::resetButton(<?= $generator->generateString('Cancel') ?>, ['class' => 'btn btn-danger btn-block'])?>
    	</div>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
