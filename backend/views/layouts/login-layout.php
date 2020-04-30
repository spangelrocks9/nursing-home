<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use backend\widgets\Alert;
/* @var $this \yii\web\View */
/* @var $content string */

\backend\assets\AppAsset::register($this);
?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="mobile-web-app-capable" content="yes">

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode(Yii::$app->name) ?></title>

        <?php $this->head() ?>
    </head>
    <body class="auth-wrapper">
        <div class="all-wrapper menu-side with-pattern">
            <div class="auth-box-w">
                <div class="logo-w">
                    <i class="os-icon os-icon-printer"></i>
                    <?=Yii::$app->name;?>
                </div>
                <?php $this->beginBody() ?>        
                <?//=Alert::widget();?>
                <?= $content ?>

                <div class="copyright"><?=Html::a('Developed by Elite Technologies','http://elitech.com.np',['target' => '_blank']);?></div>
            </div>
        </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>