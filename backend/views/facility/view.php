<?php
use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\CommonHelper;
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

            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'vendor_id',
                    [
                        'label' => Yii::t('app','First Name'),
                        'attribute' => 'first_name',
                        'value' => function ($model) {
                            return $model->first_name;
                        },
                    ],
                    [
                        'label' => Yii::t('app','Last Name'),
                        'attribute' => 'last_name',
                        'value' => function ($model) {
                            return $model->last_name;
                        },
                    ],
                    [
                        'label' => Yii::t('app','Date of Birth'),
                        'attribute' => 'date_of_birth',
                        'value' => function ($model) {
                            return $model->date_of_birth;
                        },
                    ],
                    [
                        'label' => Yii::t('app','Room Number'),
                        'attribute' => 'room_number',
                        'value' => function ($model) {
                            return $model->room_number;
                        },
                    ],
                    [
                        'label' => Yii::t('app','Unit'),
                        'attribute' => 'unit_name',
                        'value' => function ($model) {
                            return $model->unit_name;
                        },
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('View', ['/patient/view', 'id' => $model->patient_id]);
                            },
                        ],
                    ],
                ],
                'tableOptions' =>['class' => 'table table-striped'],
            ]); ?>
        </div>
    </div>
</div>