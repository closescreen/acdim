<?php
namespace app\models;
use yii\db\ActiveRecord;

class Orgs extends ActiveRecord{

    // юзеры организации    
    public function getUsers(){
        return $this->hasMany( Users::classname(), ['org_id' => 'id'] );
    }

    // тип организации
    public function getOrg_types(){
        return $this->hasOne( Org_types::className(), ['id' => 'org_type_id'] );
    }
    
//    public function getUsers(){
//        $this->hasmany( Users::classname(), ['org_id' => 'id'] );
//    }

    
    
}
?>