<?php

namespace app\models;

use Yii;


class Insalon extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'insalon';
    }


    public function rules()
    {
        return [
            [['active', 'salon_id', 'created_by_user_id', 'changed_by_user_id', 'client_fname', 'client_sname', 'client_tname', 'client_bdate', 'client_phone', 'car_price', 'down_payment', 'equipment_cost', 'equipment_desc', 'car_model', 'car_year', 's1', 's2', 's3', 's4', 's5'], 'required'],
            [['active', 'salon_id', 'created_by_user_id', 'changed_by_user_id', 'car_price', 'down_payment', 'equipment_cost', 'car_year'], 'integer'],
            [['created', 'changed', 'client_bdate'], 'safe'],
            [['client_fname', 'client_sname', 'client_tname'], 'string', 'max' => 20],
            [['client_phone'], 'string', 'max' => 45],
            [['equipment_desc', 'car_model', 's1', 's2', 's3', 's4', 's5'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'active' => 'Активно',
            'salon_id' => 'Salon ID',
            'created' => 'Created',
            'created_by_user_id' => 'Created By User ID',
            'changed' => 'Changed',
            'changed_by_user_id' => 'Changed By User ID',
            'client_fname' => 'Client Fname',
            'client_sname' => 'Client Sname',
            'client_tname' => 'Client Tname',
            'client_bdate' => 'Client Bdate',
            'client_phone' => 'Client Phone',
            'car_price' => 'Car Price',
            'down_payment' => 'Down Payment',
            'equipment_cost' => 'Equipment Cost',
            'equipment_desc' => 'Equipment Desc',
            'car_model' => 'Car Model',
            'car_year' => 'Car Year',
            's1' => 'S1',
            's2' => 'S2',
            's3' => 'S3',
            's4' => 'S4',
            's5' => 'S5',
        ];
    }

        // cалон, чья заявка
    public function getSalon(){
        return $this->hasOne(Orgs::className(), ['id'=>'salon_id']);
    }

    // кто создал заявку
    public function getCreatorUser(){
        return $this->hasOne(Users::className(), ['id'=>'created_by_user_id']);
    }


    // кто последний изменял заявку
    public function  getChangerUser(){
        return $this->hasOne(Users::className(), ['id'=>'created_by_user_id']);
    }
}