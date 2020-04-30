<?php
use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\CommonHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ChequeEntrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Facility');
?>

<div class="col-lg-12">
    <div class="element-wrapper">
        <div class="element-box">
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

            <div class="row m-5">
                    <div class="col-md-2"><?= Html::a(Yii::t('app', 'Add Assessment'), ['/assessment/create','id' => $model->patient_id],['class' => 'btn btn-primary btn-block']) ?></div>
                    <div class="col-md-2"><?= Html::a(Yii::t('app', 'Add progress note'),['/progress-note/create','id' => $model->patient_id], ['class' => 'btn btn-primary btn-block']) ?></div>
                </div>

            <div class="row">
                <h6>Assessment</h6>
                <div class="col-md-12">
                    <ul>
                        <?php if($assessment){
                            foreach($assessment as $a){
                                $pending_date = date('Y-m-d',strtotime("+15 days",strtotime($model->date_of_admission)));
                                ?>
                                <li><?php echo Html::a('Assessment (pending - '.$pending_date.' | completed - '.$a->completed_datetime.')',['/progress','id' => $a->assessment_id]);?></li>
                            <?php }
                        }?>
                    </ul>
                </div>
            </div>

            <div class="row">
                <h6>Progress notes</h6>
                <div class="col-md-12">
                <ul>
                    <?php if($progress){
                        foreach($progress as $p){?>
                            <li><?php echo Html::a($p->note .' - '. $p->datetime,['/progress','id' => $p->progress_note_id]);?></li>
                        <?php }
                    }?>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>