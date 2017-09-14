<?php
namespace app\models;
use yii\db\ActiveRecord;

class Org_types extends ActiveRecord{

    // организации этого типа
    public function getOrgs(){
        return $this->hasMany( Orgs::className(), ['org_type_id'=>'id'] );
    }
}
?>