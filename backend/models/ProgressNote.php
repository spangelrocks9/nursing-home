<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "progress_note".
 *
 * @property int $progress_note_id
 * @property int $patient_id
 * @property string $note
 * @property int $user_id
 * @property string $datetime
 *
 * @property PatientDetails $patient
 * @property UserDetails $user
 */
class ProgressNote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'progress_note';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id', 'note', 'user_id', 'datetime'], 'required'],
            [['patient_id', 'user_id'], 'integer'],
            [['datetime'], 'safe'],
            [['note'], 'string', 'max' => 5000],
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
            'progress_note_id' => Yii::t('app', 'Progress Note ID'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'note' => Yii::t('app', 'Note'),
            'user_id' => Yii::t('app', 'User ID'),
            'datetime' => Yii::t('app', 'Date'),
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