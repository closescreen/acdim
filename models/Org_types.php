<?php
namespace app\models;
use yii\db\ActiveRecord;
class Org_types extends ActiveRecord{
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 20472767f7b9716ae26cc1558d1485727e44b527
    // организации этого типа
    public function getOrgs(){
        return $this->hasMany( Orgs::className(), ['org_type_id'=>'id'] );
    }
<<<<<<< HEAD
=======

>>>>>>> ca121cc6397939196af178d516a47e1270363547
=======

>>>>>>> 20472767f7b9716ae26cc1558d1485727e44b527
}
?>