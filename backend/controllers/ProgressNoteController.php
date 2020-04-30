<?php

namespace backend\controllers;

use backend\models\PatientDetails;
use Yii;
use backend\models\ProgressNote;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class ProgressNoteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Creates a new Patient model.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $patient = PatientDetails::findOne($id);
        $model = new ProgressNote();

        if ($model->load(Yii::$app->request->post())) {
            $model->patient_id = $id;
            $model->user_id = Yii::$app->user->identity->user_id;
            if($model->save()) {
                Yii::$app->session->setFlash('success', 'Created Successfully.');
                return $this->goBack(Yii::$app->request->referrer);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'patient' => $patient,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $patient = PatientDetails::findOne($model->patient_id);
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->identity->user_id;
            if($model->save()) {
                Yii::$app->session->setFlash('success', 'Updated Successfully.');
                return $this->goBack(Yii::$app->request->referrer);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'patient' => $patient,
        ]);
    }

    public function actionView($id)
    {
        $model = PatientDetails::findOne($id);
        $progress = ProgressNote::find()->where('patient_id=:patient_id', [':patient_id' => $id])->all();
        $assessment = Assessment::find()->where('patient_id=:patient_id', [':patient_id' => $id])->all();
        return $this->render('view', [
            'model' => $model,
            'progress' => $progress,
            'assessment' => $assessment,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = ProgressNote::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
