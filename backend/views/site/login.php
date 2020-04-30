<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = Yii::t('app', Yii::$app->name);
?>


<h4 class="auth-header">
  App Login
</h4>
<?php echo \Yii::$app->session->getFlash('loginError'); ?>

<?php $form = ActiveForm::begin(['id' => 'loginForm']); ?>

<?= $form->field($model, 'username')->textInput(['placeholder'=>Yii::t('app', 'Username'), 'class'=>'form-control'])->label(false) ?>

<?= $form->field($model, 'password')->passwordInput(['class'=>'form-control', 'placeholder'=>Yii::t('app', 'Password')])->label(false) ?>

<div class="form-group m-b-xl">
  <div class="checkbox checkbox-primary">
      <!-- <input type="checkbox" id="keep_me_logged_in"/> -->
      <?= $form->field($model, 'rememberMe', [
          'inputTemplate' => '{input} <label for="loginform-rememberme">Remember Me</label>'])->checkbox()->label(false);
        ?>
  </div>
</div>
<?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'btnLogin']) ?>

<?php ActiveForm::end(); ?>