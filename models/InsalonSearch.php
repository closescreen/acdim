<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Insalon;

/**
 * InsalonSearch represents the model behind the search form about `app\models\Insalon`.
 */
class InsalonSearch extends InsalonMaxStateLastMsg //Insalon
{



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[
                'id',
                'active',
                'salon_id',
                'created_by_user_id',
                'changed_by_user_id',
                'car_price',
                'down_payment',
                'equipment_cost',
                'car_year',
                'state_stage',
                'm_id',
                'm_inbank_id',
                'm_created_by_user_id'],
                    'integer'],
            [['created',
                'changed',
                'client_fname',
                'client_sname',
                'client_tname',
                'client_fio',
                'client_bdate',
                'client_phone',
                'equipment_desc',
                'car_model',
                's1', 's2', 's3', 's4', 's5',
                'state_id',
                'state_name',
                'm_created_text',
                'm_created',
                'salon_name' ],
                    'safe'],
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

     public function attributes()
     {
         // делаем поле зависимости доступным для поиска
         return
             array_merge(parent::attributes(),
                 [

                 ]);
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
        //$query = Insalon::find();
        $query = InsalonMaxStateLastMsg::find();

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
          //  'id' => $this->id,
            'active' => $this->active,
            'salon_id' => $this->salon_id,
            'created_by_user_id' => $this->created_by_user_id,
            'changed_by_user_id' => $this->changed_by_user_id,
            //'client_bdate' => $this->client_bdate,
            //'car_price' => $this->car_price,
            //'down_payment' => $this->down_payment,
            //'equipment_cost' => $this->equipment_cost,
//            'car_year' => $this->car_year,

        ]);

        $query
            ->andFilterWhere(['like', 'salon_name', $this->salon_name])
            ->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'client_fname', $this->client_fname])
            ->andFilterWhere(['like', 'client_sname', $this->client_sname])
            ->andFilterWhere(['like', 'client_tname', $this->client_tname])
            ->andFilterWhere(['like', 'client_fio', $this->client_fio])
            ->andFilterWhere(['like', 'client_phone', $this->client_phone])
            ->andFilterWhere(['like', 'client_bdate', $this->client_bdate])
            ->andFilterWhere(['like', 'equipment_desc', $this->equipment_desc])
            ->andFilterWhere(['like', 'car_model', $this->car_model])
            ->andFilterWhere(['like', 'car_price', $this->car_price])
            ->andFilterWhere(['like', 'down_payment', $this->down_payment])
            ->andFilterWhere(['like', 'equipment_cost', $this->equipment_cost])
            ->andFilterWhere(['like','state_name', $this->state_name])
            ->andFilterWhere(['like', 's1', $this->s1])
            ->andFilterWhere(['like', 's2', $this->s2])
            ->andFilterWhere(['like', 's3', $this->s3])
            ->andFilterWhere(['like', 's4', $this->s4])
            ->andFilterWhere(['like', 's5', $this->s5])
            ->andFilterWhere(['like', 'm_created_text', $this->m_created_text])
            ->andFilterWhere(['like', 'created', $this->created])
            ->andFilterWhere(['like', 'changed', $this->changed])
            ->andFilterWhere(['like', 'car_year', $this->car_year])
        ;

        return $dataProvider;
    }
}
