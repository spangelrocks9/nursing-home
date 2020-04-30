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
    <body class="menu-position-side menu-side-left full-screen">
        <?php $this->beginBody() ?>
            <div class="all-wrapper solid-bg-all">
                <div class="layout-w">
                    <?php echo $this->render('top') ?>
                    <div class="content-w">
                        <?php echo $this->render('top2') ?>
                        <div class="content-i">
                            <div class="content-box">
                                <div class="col-lg-12">
                                    <?=Alert::widget();?>
                                </div>

                                <?= $content ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>