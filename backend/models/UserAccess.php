<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_access".
 *
 * @property int $user_access_id
 * @property string $granted_datetime
 * @property int $granter_userID
 * @property int $user_id
 * @property int $facility_id
 *
 * @property Facility $facility
 * @property UserDetails $user
 */
class UserAccess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_access';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['granted_datetime', 'user_id', 'facility_id'], 'required'],
            [['granted_datetime'], 'safe'],
            [['granter_userID', 'user_id', 'facility_id'], 'integer'],
            [['facility_id'], 'exist', 'skipOnError' => true, 'targetClass' => Facility::className(), 'targetAttribute' => ['facility_id' => 'facility_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserDetails::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_access_id' => Yii::t('app', 'User Access ID'),
            'granted_datetime' => Yii::t('app', 'Granted Datetime'),
            'granter_userID' => Yii::t('app', 'Granter User ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'facility_id' => Yii::t('app', 'Facility ID'),
        ];
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
    public function getUser()
    {
        return $this->hasOne(UserDetails::className(), ['user_id' => 'user_id']);
    }

    public static function allow($facility_id){
        return static::find()->where('facility_id=:facility_id AND user_id=:user_id',[':facility_id' => $facility_id,':user_id' => Yii::$app->user->identity->user_id])->exists();
    }
}