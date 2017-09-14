<?php
namespace app\models;
use yii\db\ActiveRecord;
class Org_types extends ActiveRecord{
<<<<<<< HEAD
    // организации этого типа
    public function getOrgs(){
        return $this->hasMany( Orgs::className(), ['org_type_id'=>'id'] );
    }
=======

>>>>>>> ca121cc6397939196af178d516a47e1270363547
}
?>