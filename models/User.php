<?php

namespace app\models;

use app\models\Users;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $org_id;
    public $org_name;
    public $org_type_id;
    public $org_type_name;
    private static $is_loaded_from_db;
    

    private static $users = [
        '-100' => [
            'id' => '-100',
            'username' => 'admin',
            'password' => 'VeryCoolBoy',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
            'org_id' => '1', // это д.б. административная орг
            'org_name' => 'Админы(встроенная)', // игнорируем БД
            'org_type_id' => 'admins', // игнор  БД
            'org_type_name' => 'Административная(встроенная)'
        ],
    ];
    
    
    
    private static function load_users_from_db(){
     
     if (self::$is_loaded_from_db) return;
        
     $userlist = Users::find()
            ->with('orgs.org_types')
            ->all();
            
            
//     joinWith('org')->where(['org.id'=>''])->all();
//     $userlist = Users::find()->all();

     foreach ( $userlist as $u ){
//        print_r($u);
	self::$users[ (string)$u->id ] = [
	    'id'=>(string)$u->id, 
	    'username'=>$u->username,
	    'password'=>$u->password,
	    'authKey'=>'test'.$u->id.'key',
	    'accessToken'=>$u->id.'-token',
	    'org_id'=>(string)$u->org_id,
            'org_name'=>$u->orgs->name,
            'org_type_id'=>$u->orgs->org_type_id,
            'org_type_name'=>$u->orgs->org_types->name,
	    ];
     }
     self::$is_loaded_from_db = true;
    }
    

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {   
        self::load_users_from_db();
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        self::load_users_from_db();        

        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
