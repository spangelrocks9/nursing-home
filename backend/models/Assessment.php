<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assessment".
 *
 * @property int $assessment_id
 * @property int $patient_id
 * @property int $user_id
 * @property string $updated_datetime
 * @property string $detail1
 * @property string $detail2
 * @property string $detail3
 * @property string $completed_datetime
 *
 * @property PatientDetails $patient
 * @property UserDetails $user
 */
class Assessment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assessment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id', 'user_id', 'updated_datetime'], 'required'],
            [['patient_id', 'user_id'], 'integer'],
            [['updated_datetime', 'completed_datetime','detail1', 'detail2', 'detail3'], 'safe'],
//            [['detail1', 'detail2', 'detail3'], 'string', 'max' => 255],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientDetails::className(), 'targetAttribute' => ['patient_id' => 'patient_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'assessment_id' => Yii::t('app', 'Assessment ID'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'updated_datetime' => Yii::t('app', 'Updated Datetime'),
            'detail1' => Yii::t('app', 'Detail1'),
            'detail2' => Yii::t('app', 'Detail2'),
            'detail3' => Yii::t('app', 'Detail3'),
            'completed_datetime' => Yii::t('app', 'Completed Datetime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(PatientDetails::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserDetails::className(), ['user_id' => 'user_id']);
    }
}