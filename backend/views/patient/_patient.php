<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row">
    <h6 class="element-header"><?php echo $model->facility->facility_name;?></h6>
</div>

<?php if($model->image) {
    $img = Url::to('@uploadUrl/patient/') . $model->image;
}else {
    $img = Url::to('@uploadUrl') . '/avatar.png';
}
?>
<div class="row m-5">
    <div class="col-md-3">
        <?php echo Html::img($img,['class' => 'img-responsive']);?>
    </div>
    <div class="col-md-9">
        <p><?php echo $model->getFullName();?></p>
        <p><?php echo $model->sex;?></p>
        <p><?php echo $model->date_of_birth;?></p>
    </div>
</div>