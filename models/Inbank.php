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
 * @property integer $credit_amount
 * @property integer $credit_rate
 * @property integer $credit_months
 * @property string $b1
 * @property string $b2
 * @property string $b3
 * @property string $b4
 * @property string $b5
 */
class Inbank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inbank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'insalon_id', 'bank_id', 'changed_by_user_id',
                'credit_amount', 'credit_rate', 'credit_months' ], 'integer'],
            [['insalon_id', 'bank_id' ], 'required'],
            [['changed', 'changed_by_user_id'], 'safe'],
            [['state_id'], 'string', 'max' => 10],
            [['state_desc', 'b1', 'b2', 'b3', 'b4', 'b5'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'active' => 'Открыта',
            'insalon_id' => 'Insalon ID',
            'bank_id' => 'Bank ID',
            'changed' => 'Изменена',
            'changed_by_user_id' => 'Изменена пользователем',
            'state_id' => 'State ID',
            'state_desc' => 'Примечания банка',
            'credit_amount'=>'Сумма кредита',
            'credit_rate'=>'Процентная ставка (%)',
            'credit_months'=>'Срок кредита (мес)',
            'b1' => 'B1',
            'b2' => 'B2',
            'b3' => 'B3',
            'b4' => 'B4',
            'b5' => 'B5',
        ];
    }

    public function getInsalon(){
        return $this->hasOne(Insalon::className(),['id'=>'insalon_id']);
    }

    public function getState(){
        return $this->hasOne(Rstates::className(), ['id'=>'state_id']);
    }

    public function getMessages(){
        return $this->hasMany(Message::className(), ['inbank_id'=>'id']);
    }

    public function getBank(){
        return $this->hasOne(Orgs::className(), ['id'=>'bank_id']);
    }

    public function getUploads(){
        return $this->hasMany(Upload::className(),['inbank_id'=>'id']);
    }

    public function getInbankLastMsg(){
        return $this->hasOne(InbankLastMsgView::className(), ['id'=>'id']);
    }
}
