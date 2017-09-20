<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inbank;

/**
 * InbankSearch represents the model behind the search form about `app\models\Inbank`.
 */
class InbankSearch extends Inbank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active', 'insalon_id', 'bank_id', 'changed_by_user_id'], 'integer'],
            [['changed', 'state_id', 'state_desc', 'b1', 'b2', 'b3', 'b4', 'b5'], 'safe'],
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
        $query = Inbank::find();

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
            'id' => $this->id,
            'active' => $this->active,
            'insalon_id' => $this->insalon_id,
            'bank_id' => $this->bank_id,
            'changed' => $this->changed,
            'changed_by_user_id' => $this->changed_by_user_id,
        ]);

        $query->andFilterWhere(['like', 'state_id', $this->state_id])
            ->andFilterWhere(['like', 'state_desc', $this->state_desc])
            ->andFilterWhere(['like', 'b1', $this->b1])
            ->andFilterWhere(['like', 'b2', $this->b2])
            ->andFilterWhere(['like', 'b3', $this->b3])
            ->andFilterWhere(['like', 'b4', $this->b4])
            ->andFilterWhere(['like', 'b5', $this->b5]);

        return $dataProvider;
    }
}
