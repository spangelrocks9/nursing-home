<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Facility');
?>

<div class="col-lg-12">
    <div class="element-wrapper">
        <div class="element-box">
            <?php echo $this->render('_patient',['model' => $model]);?>

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
                                <li><?php echo Html::a('Assessment (pending - '.$pending_date.' | completed - '.$a->completed_datetime.')',['/assessment/update','id' => $a->assessment_id]);?></li>
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
                            <li><?php echo Html::a($p->note .' - '. $p->datetime,['/progress-note/update','id' => $p->progress_note_id]);?></li>
                        <?php }
                    }?>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>