<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uploads".
 *
 * @property integer $id
 * @property integer $active
 * @property string $created
 * @property integer $created_by_user_id
 * @property string $changed
 * @property integer $changed_by_user_id
 * @property string $file_name
 * @property string $file_real_name
 * @property string $file_desc
 * @property integer $inbank_id
 */
class Upload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uploads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'created_by_user_id', 'changed_by_user_id','inbank_id'], 'integer'],
            //  попробовать 'value' => null
            [['created', 'changed'], 'safe'],
            [
                ['created_by_user_id',
                    'changed_by_user_id',
                    'file_name',
                    'file_real_name',
                    'file_desc'],
                'required'],
            [['file_name'], 'file'],
            [[ 'file_desc'], 'string', 'max' => 512],
            [['file_real_name'],'string','max'=>512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Активно',
            'created' => 'Создано',
            'created_by_user_id' => 'Создано пользователем',
            'changed' => 'Изменено',
            'changed_by_user_id' => 'Изменено пользователем',
            'file_name' => 'Файл',
            'file_desc' => 'Описание файла',
            'inbank_id' => 'inbank_id',
        ];
    }
}
