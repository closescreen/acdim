<?php

namespace app\models;

//use Yii;


class InsalonMaxStateLastMsg extends Insalon //\yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'insalon_max_state_last_msg';
    }

    public static function primaryKey()
    {
        return ['id'];
    }


//    public function rules()
//    {
//        return [
//            [
//                ['active', 'salon_id', 'created_by_user_id', 'changed_by_user_id',
//                    'client_fname', 'client_sname', 'client_tname', 'client_bdate',
//                    'client_phone', 'car_price', 'down_payment', 'equipment_cost',
//                     'car_model', 'car_year'
//                ], 'required'],
//            [
//                ['active', 'salon_id', 'created_by_user_id',
//                    'changed_by_user_id', 'car_price', 'down_payment',
//                    'equipment_cost', 'car_year'
//                ], 'integer'],
//            [['equipment_desc','created', 'changed', 'client_bdate', 's1', 's2', 's3', 's4', 's5'], 'safe'],
//            [['client_fname', 'client_sname', 'client_tname'], 'string', 'max' => 20],
//            [['client_phone'], 'string', 'max' => 45],
//            [['equipment_desc', 'car_model', 's1', 's2', 's3', 's4', 's5'], 'string', 'max' => 255],
//        ];
//    }


    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'active' => 'Актуальна',
            'salon_id' => 'Salon ID',
            'salon_name'=>'Салон',
            'created' => 'Создана',
            'created_by_user_id' => 'Создана пользователем',
            'changed' => 'Изменена',
            'changed_by_user_id' => 'Изменена пользователем',
            'client_fname' => 'Имя',
            'client_sname' => 'Отчество',
            'client_tname' => 'Фамилия',
            'client_bdate' => 'Дата рождения',
            'client_phone' => 'Телефон',
            'car_price' => 'Стоимость авто',
            'down_payment' => 'Первоначальный взнос',
            'equipment_cost' => 'Стоимость оборудования',
            'equipment_desc' => 'Описание оборудования',
            'car_model' => 'Модель авто',
            'car_year' => 'Год выпуска',
  //          's1' => 'S1',
  //          's2' => 'S2',
  //          's3' => 'S3',
  //          's4' => 'S4',
  //          's5' => 'S5',
            'state_name' => 'Состояние',
            'm_created' => 'Время сообщ',
            'm_created_text' => 'Сообщение',//время+сообщ
        ];
    }


//        // cалон, чья заявка
//    public function getSalon(){
//        return $this->hasOne(Orgs::className(), ['id'=>'salon_id']);
//    }
//
//    // кто создал заявку
//    public function getCreatorUser(){
//        return $this->hasOne(Users::className(), ['id'=>'created_by_user_id']);
//    }
//
//
//    // кто последний изменял заявку
//    public function  getChangerUser(){
//        return $this->hasOne(Users::className(), ['id'=>'created_by_user_id']);
//    }
//
//    public function getInbanks(){
//        return $this->hasMany(Inbank::className(), ['insalon_id'=>'id']);
//    }
}