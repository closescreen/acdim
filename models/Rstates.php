<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rstates".
 *
 * @property string $id
 * @property string $name
 * @property string $style
 */
class Rstates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rstates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'style'], 'required'],
            [['id'], 'string', 'max' => 10],
            [['name', 'style'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'style' => 'Style',
        ];
    }
}
