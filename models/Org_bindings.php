<?php
namespace app\models;
use yii\db\ActiveRecord;

// привязки банков к салонам
class Org_bindings extends ActiveRecord{

    // Связь с Банком
    public function getBank_id(){
        $this->hasOne( Orgs::className(), ['id' => 'bank_id'] );
    }

    // связь с салоном
    public function getSalon_id(){
        $this->hasOne( Orgs::className(), ['id' => 'salon_id'] );
    }
    
}
?>