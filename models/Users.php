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
<<<<<<< HEAD
=======
    public function getOrg(){
        return $this->hasOne(Orgs::className(), ['id'=>'org_id']);
    }
>>>>>>> ca121cc6397939196af178d516a47e1270363547
}
?>
=======
>>>>>>> 21d8d75812456c9a5d9c3a6930b6deb9f340dc1d

}
>>>>>>> 20472767f7b9716ae26cc1558d1485727e44b527
