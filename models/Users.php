<?php
namespace app\models;
use yii\db\ActiveRecord;

class Users extends ActiveRecord{
    public function getOrg(){
        return $this->hasOne(Orgs::className(), ['id'=>'org_id']);
    }
}
?>