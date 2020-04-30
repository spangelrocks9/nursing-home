<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "patient_details".
 *
 * @property int $patient_id
 * @property int $facility_id
 * @property string $first_name
 * @property string $last_name
 * @property resource $image
 * @property int $sex
 * @property string $date_of_birth
 * @property string $date_of_admission
 * @property string $room_number
 * @property string $unit_name
 *
 * @property Assessment[] $assessments
 * @property Facility $facility
 * @property ProgressNote[] $progressNotes
 */
class PatientDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['facility_id', 'first_name', 'last_name', 'date_of_birth', 'date_of_admission', 'room_number', 'unit_name'], 'required'],
            [['facility_id'], 'integer'],
            [['sex'], 'string'],
            [['date_of_birth', 'date_of_admission'], 'safe'],
            [['first_name', 'last_name', 'room_number', 'unit_name'], 'string', 'max' => 255],
            [['facility_id'], 'exist', 'skipOnError' => true, 'targetClass' => Facility::className(), 'targetAttribute' => ['facility_id' => 'facility_id']],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => Yii::t('app', 'Patient ID'),
            'facility_id' => Yii::t('app', 'Facility'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'image' => Yii::t('app', 'Image'),
            'sex' => Yii::t('app', 'Sex'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'date_of_admission' => Yii::t('app', 'Date Of Admission'),
            'room_number' => Yii::t('app', 'Room Number'),
            'unit_name' => Yii::t('app', 'Unit Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssessments()
    {
        return $this->hasMany(Assessment::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacility()
    {
        return $this->hasOne(Facility::className(), ['facility_id' => 'facility_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgressNotes()
    {
        return $this->hasMany(ProgressNote::className(), ['patient_id' => 'patient_id']);
    }

    public function getFullName(){
        return $this->first_name.' '.$this->last_name;
    }
}