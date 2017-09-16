<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class UsersSearch extends Users
{
    public static function tableName()
    {
        return 'users';
    }

    public function attributes()
    {
        // делаем поле зависимости доступным для поиска
        return array_merge(parent::attributes(), ['org.name','org.org_type_id']);
    }
    
    public function rules()
    {
        // только поля определенные в rules() будут доступны для поиска
        return [
            [['fio','username','org.name','org.org_type_id'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Users::find()
            ->joinWith(
                [ 
                    'org' => function( $query ){ 
                        $query->from(['org' => 'orgs']); 
                    }
                ]
            );
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // загружаем данные формы поиска и производим валидацию
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // изменяем запрос добавляя в его фильтрацию
        $query->andFilterWhere(['like','fio' , $this->fio]);
        $query->andFilterWhere(['like', 'username', $this->username]);
        $query->andFilterWhere(['like', 'org.name', $this->getAttribute('org.name')]);
        $query->andFilterWhere(['like', 'org.org_type_id', $this->getAttribute('org.org_type_id')]);

        return $dataProvider;
    }
}