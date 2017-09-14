<?php
namespace app\models;
use yii\db\ActiveRecord;

class Users extends ActiveRecord{
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 20472767f7b9716ae26cc1558d1485727e44b527
    
    // организация пользователя
    public function getOrg(){
        return $this->hasOne(Orgs::className(), ['id'=>'org_id']);
    }

<<<<<<< HEAD
=======
    public function getOrg(){
        return $this->hasOne(Orgs::className(), ['id'=>'org_id']);
    }
>>>>>>> ca121cc6397939196af178d516a47e1270363547
}
?>
=======

}
>>>>>>> 20472767f7b9716ae26cc1558d1485727e44b527
