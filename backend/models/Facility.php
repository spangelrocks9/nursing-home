<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "facility".
 *
 * @property int $facility_id
 * @property string $facility_name
 * @property string $details
 * @property int $org_id
 *
 * @property Organization $org
 * @property PatientDetails[] $patientDetails
 * @property UserAccess[] $userAccesses
 */
class Facility extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facility';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['facility_name'], 'required'],
            [['org_id'], 'integer'],
            [['facility_name', 'details'], 'string', 'max' => 255],
            [['org_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['org_id' => 'org_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'facility_id' => Yii::t('app', 'Facility ID'),
            'facility_name' => Yii::t('app', 'Facility Name'),
            'details' => Yii::t('app', 'Details'),
            'org_id' => Yii::t('app', 'Org ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organization::className(), ['org_id' => 'org_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientDetails()
    {
        return $this->hasMany(PatientDetails::className(), ['facility_id' => 'facility_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAccesses()
    {
        return $this->hasMany(UserAccess::className(), ['facility_id' => 'facility_id']);
    }

    public static function dropDown(){
        return ArrayHelper::map(self::find()->all(),'facility_id','facility_name');
    }
}