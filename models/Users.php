<?php
namespace app\models;
use yii\db\ActiveRecord;

class Users extends ActiveRecord{
    // организация пользователя
    public function getOrgs(){
        return $this->hasOne(Orgs::className(), ['id'=>'org_id']);
    }

}
?>

