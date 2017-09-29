<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orgs".
 *
 * @property integer $id
 * @property string $name
 * @property string $org_type_id
 * @property integer $active
 */
class Orgs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orgs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'org_type_id'], 'required'],
            [['active'], 'integer'],
            [['name', 'org_type_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Org name'),
            'org_type_id' => Yii::t('app', 'Org Type ID'),
            'active' => Yii::t('app', 'Active'),
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
