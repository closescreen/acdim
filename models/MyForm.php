<?php
namespace app\models;
use Yii;
use yii\base\Model;
class MyForm extends \yii\base\Model
{
    public $name;
    public $email;
    public $file;
    
    public function rules(){
        return [
            [['name', 'email'], 'required','message'=>'Не заполнено поле'],
            ['email','email', 'message'=>'Некорректный e-mail'],
	    ['file','file', /*отлючено 'extensions'=>'doc, pdf, jpg, jpeg, png, txt'*/]
        ];
    }
}

?>