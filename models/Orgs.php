<?php
namespace app\models;
use yii\db\ActiveRecord;

class Orgs extends ActiveRecord{

        /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'org_type_id'=>'Тип',
            'active' => 'Активно',
        ];
    }

    // юзеры организации    
    public function getUsers(){
        return $this->hasMany( Users::classname(), ['org_id' => 'id'] );
    }

    // тип организации
    public function getOrg_type(){
        return $this->hasOne( Org_types::className(), ['id' => 'org_type_id'] );
    }
    
    public function getOrg_bindings( $org_type_id ){
        // салон передает $org_type_id='salon'
        // банк передает $org_type_id='bank'
        // администрация предает $org_type_id='admins'
        if ( !$org_type_id ) throw new \Exception("org_type_id!" );
        if ( $org_type_id == 'salon' ){
            return $this->hasMany( Org_bindings::className(), [ 'salon_id' => 'id' ] );
        }elseif( $org_type_id == 'bank' ){
            return $this->hasMany( Org_bindings::className(), [ 'bank_id' => 'id' ] );
        }else{ 
            throw new \Exception("bad org_type_id ${org_type_id}" );
        }
        
    }
    
    
}
?>