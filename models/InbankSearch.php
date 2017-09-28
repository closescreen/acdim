<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inbank;

/**
 * InbankSearch represents the model behind the search form about `app\models\Inbank`.
 */
class InbankSearch extends InbankLastMsgView // Inbank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return
            [
            [['id', 'active', 'insalon_id', 'bank_id', 'changed_by_user_id',
                's_car_price','s_down_payment','s_equipment_cost','s_car_year'
            ], 'integer'],
            [[
                'changed', 'state_id', 'state_desc', 'b1', 'b2', 'b3', 'b4', 'b5',
                's_client_fio','s_client_bdate','s_client_phone',
                'bank_name','salon_name',
                's_equipment_desc',
                's_car_model',
                'm_created',
                'm_created_text',
                'insalon.client_tname',
                'insalon.client_fname',
                'insalon.client_sname',
//                'insalon.salon.name', //- отображает но не ищет
                ], 'safe'],
        ];
    }

    public function attributes()
    {
        // делаем поле зависимости доступным для поиска
        return
            array_merge( parent::attributes(),
        [
            'insalon.salon_id',
            'insalon.client_tname',
            'insalon.client_fname',
            'insalon.client_sname',
//            'insalon.salon.name' // отображает но неищет , чего-то не хватает
            'salon_name','bank_name',
            's_client_fio','s_client_bdate','s_client_phone',
            's_equipment_desc',
            's_car_model',
            'm_created',
            'm_created_text',
        ]
            );
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

        $query = InbankLastMsgView::find()
            //->from('inbank b')
            ->joinWith('insalon.salon');

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
//            'state_desc' => $this->state_desc,
//            'b1' => $this->b1,
//            'b2' => $this->b2,
//            'b3' => $this->b3,
//            'b4' => $this->b4,
//            'b5' => $this->b5,
 //           'bank_name'  => $this->bank_name,
//            's_client_fio' => $this->s_client_fio,
            's_client_bdate' => $this->s_client_bdate,
//            's_client_phone' => $this->s_client_phone,
            's_car_price' => $this->s_car_price,
            's_down_payment' => $this->s_down_payment,
            's_equipment_cost' => $this->s_equipment_cost,
//            's_equipment_desc' => $this->s_equipment_desc,
//            's_car_model' => $this->s_car_model,
            's_car_year' => $this->s_car_year,
            //'insalon.salon.name' => $this->insalon->salon->name,//так не работает

        ]);

        $query
            //->andFilterWhere(['like', 'state_id', $this->state_id])
            ->andFilterWhere(['like', 'state_desc', $this->state_desc])
            ->andFilterWhere(['like', 'b1', $this->b1])
            ->andFilterWhere(['like', 'b2', $this->b2])
            ->andFilterWhere(['like', 'b3', $this->b3])
            ->andFilterWhere(['like', 'b4', $this->b4])
            ->andFilterWhere(['like', 'b5', $this->b5])
            ->andFilterWhere(['like', 'state_desc', $this->state_desc])
            ->andFilterWhere(['like', 'bank_name', $this->bank_name])
            ->andFilterWhere(['like', 'salon_name', $this->salon_name])
            ->andFilterWhere(['like', 's_client_fio', $this->s_client_fio])
            ->andFilterWhere(['like', 's_client_phone', $this->s_client_phone])
            ->andFilterWhere(['like', 's_equipment_desc', $this->s_equipment_desc])
            ->andFilterWhere(['like', 's_car_model', $this->s_car_model])
            ->andFilterWhere(['like', 'm_created_text', $this->m_created_text]);
//            ->andFilterWhere(['like', '', $this->])
//            ->andFilterWhere(['like', '', $this->])
//            ->andFilterWhere(['like', '', $this->])
//            ->andFilterWhere(['like', '', $this->])
//            ->andFilterWhere(['like', '', $this->])
//            ->andFilterWhere(['like', '', $this->]);

        return $dataProvider;
    }
}
