<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "org_bindings".
 *
 * @property integer $id
 * @property integer $bank
 * @property integer $salon
 */
class Org_bindings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'org_bindings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_id', 'salon_id'], 'required'],
            [['bank_id', 'salon_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'bank_id' => Yii::t('app', 'Bank ID'),
            'salon_id' => Yii::t('app', 'Salon ID'),
        ];
    }

        // Связь с Банком
    public function getBank(){
        return $this->hasOne( Orgs::className(), ['id' => 'bank_id'] );
    }

    // связь с салоном
    public function getSalon(){
        return $this->hasOne( Orgs::className(), ['id' => 'salon_id'] );
    }
}
