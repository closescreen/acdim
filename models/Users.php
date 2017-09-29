<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property integer $active
 * @property string $username
 * @property string $password
 * @property string $fio
 * @property integer $org_id
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'org_id'], 'integer'],
            [['username', 'password', 'fio', 'org_id'], 'required'],
            [['username', 'password'], 'string', 'max' => 255],
            [['fio'], 'string', 'max' => 20],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'active' => Yii::t('app', 'Active'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'fio' => Yii::t('app', 'Fio'),
            'org_id' => Yii::t('app', 'Org ID'),
        ];
    }

       // организация пользователя
    public function getOrg(){
        return $this->hasOne(Orgs::className(), ['id'=>'org_id']);
    }
}
