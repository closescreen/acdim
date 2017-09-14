<?php
namespace app\models;
use yii\db\ActiveRecord;

class Users extends ActiveRecord{
    
    // организация пользователя
    public function getOrg(){
        return $this->hasOne(Orgs::className(), ['id'=>'org_id']);
    }


}
