<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inbank".
 *
 * @property integer $id
 * @property integer $active
 * @property integer $insalon_id
 * @property integer $bank_id
 * @property string $changed
 * @property integer $changed_by_user_id
 * @property string $state_id
 * @property string $state_desc
 * @property string $b1
 * @property string $b2
 * @property string $b3
 * @property string $b4
 * @property string $b5
 */
class InbankLastMsgView extends Inbank //\yii\db\ActiveRecord
{
    // а если на базе insalon ??? ( то не надо дублировать связи )
    // так и сделал - работает

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inbank_last_msg';
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * @inheritdoc
     */
//    public function rules()
//    {
//        return [
//            [['active', 'insalon_id', 'bank_id', 'changed_by_user_id'], 'integer'],
//            [['insalon_id', 'bank_id' ], 'required'],
//            [['changed', 'changed_by_user_id'], 'safe'],
//            [['state_id'], 'string', 'max' => 10],
//            [['state_desc', 'b1', 'b2', 'b3', 'b4', 'b5'], 'string', 'max' => 255],
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'active' => 'Активна',
            'insalon_id' => '№',
            'bank_id' => 'Bank ID',
            'changed' => 'Изменена',
            'changed_by_user_id' => 'Изменена пользователем',
            'state_id' => 'State ID',
            'state_desc' => 'State Desc',
            'b1' => 'B1',
            'b2' => 'B2',
            'b3' => 'B3',
            'b4' => 'B4',
            'b5' => 'B5',
            'bank_name' =>'Банк',
            'salon_name'=>'Салон',
            's_client_fio'=>'ФИО Клиента',
            's_client_bdate'=>'Д.р. кл.',
            's_client_phone'=>'телефон кл.',
            's_car_model'=>'Модель авто',
            's_car_year'=>'Год авто',
            's_car_price'=>'Стоим. авто',
            's_down_payment'=>'Перв. взнос',
            's_equipment_cost'=>'Стоим. оборуд.',
            'm_created_text'=>'Сообщение',
            'm_created'=>'Время сообщение',

        ];
    }

//    public function getInsalon(){
//        return $this->hasOne(Insalon::className(),['id'=>'insalon_id']);
//    }
//
//    public function getState(){
//        return $this->hasOne(Rstates::className(), ['id'=>'state_id']);
//    }
//
//    public function getMessages(){
//        return $this->hasMany(Message::className(), ['inbank_id'=>'id']);
//    }
//
//    public function getBank(){
//        return $this->hasOne(Orgs::className(), ['id'=>'bank_id']);
//    }
//
//    public function getUploads(){
//        return $this->hasMany(Upload::className(),['inbank_id'=>'id']);
//    }
}
