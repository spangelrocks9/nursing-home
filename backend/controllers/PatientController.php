<?php

namespace backend\controllers;

use Yii;
use backend\models\Assessment;
use backend\models\ProgressNote;
use backend\models\PatientDetails;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class PatientController extends Controller
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
    public function actionCreate()
    {
        $model = new PatientDetails();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->image = UploadedFile::getInstance($model,'image');
            if($model->image)
            {
                $ext =  $model->image->getExtension();
                $filename = time().".{$ext}";

                $model->image->saveAs(Yii::getAlias('@storage').'/patient/'.$filename);
                $model->image = $filename;
            }

            if($model->save())
            {
                Yii::$app->session->setFlash('success', 'Created Successfully.');
                return $this->redirect(['create']);
            }
            Yii::$app->session->setFlash('success', 'Created Successfully.');
            return $this->redirect(['create']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionView($id){
        $model = PatientDetails::findOne($id);
        $progress = ProgressNote::find()->where('patient_id=:patient_id',[':patient_id' => $id])->all();
        $assessment = Assessment::find()->where('patient_id=:patient_id',[':patient_id' => $id])->all();
        return $this->render('view', [
            'model' => $model,
            'progress' => $progress,
            'assessment' => $assessment,
        ]);
    }
}
