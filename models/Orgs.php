<?php
namespace app\models;
use yii\db\ActiveRecord;

class Orgs extends ActiveRecord{
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 20472767f7b9716ae26cc1558d1485727e44b527

    // юзеры организации    
    public function getUsers(){
        $this->hasMany( Users::classname(), ['org_id' => 'id'] );
    }

    // тип организации
    public function getOrg_type(){
        $this->hasOne( Org_type::className(), ['id' => 'org_type_id'] );
    }
<<<<<<< HEAD
=======
    
//    public function getUsers(){
//        $this->hasmany( Users::classname(), ['org_id' => 'id'] );
//    }
>>>>>>> ca121cc6397939196af178d516a47e1270363547
=======

    
//    public function getUsers(){
//        $this->hasmany( Users::classname(), ['org_id' => 'id'] );

>>>>>>> 20472767f7b9716ae26cc1558d1485727e44b527

    
}
?>