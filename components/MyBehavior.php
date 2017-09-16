<?php

namespace app\components;
use yii\base\Behavior;
use app\models\Users;

Class MyBehavior extends Behavior{

    public $property1 = 'свойство поведения 1';
    
    public function foo($x){
        //$this->owner; // доступ к классу, к которому примешивается поведение
        return 'метод из поведения '.$x;
    }
    
    public function events(){
        return [
            Users::EVENT_1 => 'register',
            
        ];
    }
    
    public function register(){
        debug( 'отправил письмо на почту' );
    }
    
    public function test(){
        echo '<br><br>'; debug( $this->property1 );
    }

}

?>