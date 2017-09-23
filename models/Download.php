<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "downloads".
 *
 * @property integer $id
 * @property integer $active
 * @property string $created
 * @property integer $created_by_user_id
 * @property string $changed
 * @property integer $changed_by_user_id
 * @property string $content
 * @property string $file_name
 * @property string $file_desc
 */
class Download extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'downloads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'created_by_user_id', 'changed_by_user_id'], 'integer'],
            [['created', 'changed'], 'safe'],
            [['created_by_user_id', 'changed_by_user_id', 'content', 'file_name', 'file_desc'], 'required'],
            [['content'], 'string'],
            [['file_name', 'file_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Active',
            'created' => 'Created',
            'created_by_user_id' => 'Created By User ID',
            'changed' => 'Changed',
            'changed_by_user_id' => 'Changed By User ID',
            'content' => 'Content',
            'file_name' => 'File Name',
            'file_desc' => 'File Desc',
        ];
    }
}
