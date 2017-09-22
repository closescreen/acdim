<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property integer $inbank_id
 * @property string $created
 * @property integer $created_by_user_id
 * @property string $text
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inbank_id', 'created_by_user_id'], 'required'],
            [['inbank_id', 'created_by_user_id'], 'integer'],
            [['created', 'text'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inbank_id' => 'Inbank ID',
            'created' => 'Created',
            'created_by_user_id' => 'Created By User ID',
            'text' => 'Text',
        ];
    }
}
