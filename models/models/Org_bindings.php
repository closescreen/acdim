<?php
namespace app\models;
use yii\db\ActiveRecord;

// привязки банков к салонам
class Orgs extends ActiveRecord{

    // Связь с Банком
    public function getBank(){
        $this->hasOne( Orgs::className(), ['id' => 'bank_id'] );
    }

    // Связь с Салоном
    public function getSalon(){
        $this->hasOne( Orgs::className(), ['id' => 'salon_id'] );
    }

    
}
?>