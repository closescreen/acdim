<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Org_types extends ActiveRecord{

    // организации этого типа
    public function getOrgs(){
        return $this->hasMany( Orgs::className(), ['org_type_id'=>'id'] );
    }

        /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Org name'),

        ];
    }
}
?>