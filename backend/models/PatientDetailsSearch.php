<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PatientDetails;

/**
 * PatientDetailsSearch represents the model behind the search form of `backend\models\PatientDetails`.
 */
class PatientDetailsSearch extends PatientDetails
{
    public $q;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id', 'facility_id'], 'integer'],
            [['first_name', 'last_name', 'image', 'date_of_birth', 'date_of_admission', 'room_number', 'unit_name','q','sex'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PatientDetails::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'patient_id' => $this->patient_id,
            'facility_id' => $this->facility_id,
            'sex' => $this->sex,
            'date_of_birth' => $this->date_of_birth,
            'date_of_admission' => $this->date_of_admission,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'room_number', $this->room_number])
            ->andFilterWhere(['like', 'unit_name', $this->unit_name]);

        if($this->q){
            $query->andFilterWhere(['like', 'first_name', $this->q]);
            $query->orFilterWhere(['=', 'room_number', $this->q]);
        }

        return $dataProvider;
    }
}