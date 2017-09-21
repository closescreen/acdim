<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Insalon;

/**
 * InsalonSearch represents the model behind the search form about `app\models\Insalon`.
 */
class InsalonSearch extends Insalon
{



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active', 'salon_id', 'created_by_user_id', 'changed_by_user_id', 'car_price', 'down_payment', 'equipment_cost', 'car_year'], 'integer'],
            [['created', 'changed', 'client_fname', 'client_sname', 'client_tname', 'client_bdate', 'client_phone', 'equipment_desc', 'car_model', 's1', 's2', 's3', 's4', 's5'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Insalon::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->active = 1; // default filter

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'active' => $this->active,
            'salon_id' => $this->salon_id,
            'created' => $this->created,
            'created_by_user_id' => $this->created_by_user_id,
            'changed' => $this->changed,
            'changed_by_user_id' => $this->changed_by_user_id,
            'client_bdate' => $this->client_bdate,
            'car_price' => $this->car_price,
            'down_payment' => $this->down_payment,
            'equipment_cost' => $this->equipment_cost,
            'car_year' => $this->car_year,
        ]);

        $query->andFilterWhere(['like', 'client_fname', $this->client_fname])
            ->andFilterWhere(['like', 'client_sname', $this->client_sname])
            ->andFilterWhere(['like', 'client_tname', $this->client_tname])
            ->andFilterWhere(['like', 'client_phone', $this->client_phone])
            ->andFilterWhere(['like', 'equipment_desc', $this->equipment_desc])
            ->andFilterWhere(['like', 'car_model', $this->car_model])
            ->andFilterWhere(['like', 's1', $this->s1])
            ->andFilterWhere(['like', 's2', $this->s2])
            ->andFilterWhere(['like', 's3', $this->s3])
            ->andFilterWhere(['like', 's4', $this->s4])
            ->andFilterWhere(['like', 's5', $this->s5]);

        return $dataProvider;
    }
}
