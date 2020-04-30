<?php 
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Admin Dashboard');
?>

<div class="row pt-4">
  <div class="col-sm-12">
    <!--START - Grid of tablo statistics-->
    <div class="element-wrapper">
      
      <h6 class="element-header">
        Please select the facility
      </h6>

            <div class="a_underline">
                <?php foreach($facilities as $facility){?>
                    <p><?php echo Html::a($facility->facility_name,['/facility','id' => $facility->facility_id]);?></p>
                <?php }?>
            </div>

    </div>
    <!--END - Grid of tablo statistics-->
  </div>
</div>