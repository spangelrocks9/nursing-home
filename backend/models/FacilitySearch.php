<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Facility;

/**
 * FacilitySearch represents the model behind the search form of `backend\models\Facility`.
 */
class FacilitySearch extends Facility
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['facility_id', 'org_id'], 'integer'],
            [['facility_name', 'details'], 'safe'],
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
        $query = Facility::find();

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
            'facility_id' => $this->facility_id,
            'org_id' => $this->org_id,
        ]);

        $query->andFilterWhere(['like', 'facility_name', $this->facility_name])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}