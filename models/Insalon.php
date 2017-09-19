<?php
namespace app\models;
use yii\db\ActiveRecord;
//use app\components\MyBehavior;

class Insalon extends ActiveRecord{

    public function rules(){
        return [
            [['active','salon_id',
                'created_by_user_id',
                'changed_by_user_id',
                'client_fname',
                'client_sname',
                'client_tname',
                'client_bdate',
                'client_phone',
                'car_price',
                'down_payment',
                'equipment_cost',
                'equipment_desc',
                'car_model',
                'car_year',
                ], 'required'],

            [[ 's1','s2','s3','s4','s5'], 'safe'],
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
?>

