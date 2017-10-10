<?php


namespace app\models;

use Yii;
use yii\base\Model;

/**
* UploadForm is the model behind the upload form.
*/
class UploadForm extends Model
{

public $file_name;
public $file_desc;
public $inbank_id;

/**
* @return array the validation rules.
*/
public function rules()
    {
        return [
        [['inbank_id', 'file_name' ], 'required'],
        [['inbank_id'],'integer'],
 //       [['file_name'], 'file'],
        [['file_desc'], 'string', 'max' => 255],
        [['file_desc'],'safe']
    ];
    }
}


?>