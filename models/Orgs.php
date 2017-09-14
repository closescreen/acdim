<?php
namespace app\models;
use yii\db\ActiveRecord;

class Orgs extends ActiveRecord{
<<<<<<< HEAD

    // юзеры организации    
    public function getUsers(){
        $this->hasMany( Users::classname(), ['org_id' => 'id'] );
    }

    // тип организации
    public function getOrg_type(){
        $this->hasOne( Org_type::className(), ['id' => 'org_type_id'] );
    }
=======
    
//    public function getUsers(){
//        $this->hasmany( Users::classname(), ['org_id' => 'id'] );
//    }
>>>>>>> ca121cc6397939196af178d516a47e1270363547

}
?>