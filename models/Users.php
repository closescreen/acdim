<?php
namespace app\models;
use yii\db\ActiveRecord;
//use app\components\MyBehavior;

class Users extends ActiveRecord{

    public function rules(){
        return [
            [['active','username','password','fio','org_id'], 'required'],
        ];
    }


    // организация пользователя
    public function getOrg(){
        return $this->hasOne(Orgs::className(), ['id'=>'org_id']);
    }

    

    
/*  пример примеси поведения
    public $name = 'мое свойство из модели';

    public function behaviors(){
        return [
            [ 
                'class'=> MyBehavior::className(),
                'property1' => $this->name
            ],
        ];
    }    

    
    
    const EVENT_1 = "событие 1";
    
    public function method1($event){
        debug('вызва метод method1'.self::m2());
        //$event->handled = true; // прервать цепочку
    }
    
    public function m2(){
        debug('M2');
    }
*/
}
?>

