<?php
namespace app\models;
use yii\db\ActiveRecord;

class Users extends ActiveRecord{
<<<<<<< HEAD
    
    // организация пользователя
    public function getOrg(){
        return $this->hasOne(Orgs::className(), ['id'=>'org_id']);
    }

=======
    public function getOrg(){
        return $this->hasOne(Orgs::className(), ['id'=>'org_id']);
    }
>>>>>>> ca121cc6397939196af178d516a47e1270363547
}
?>