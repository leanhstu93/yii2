<?php

namespace frontent\models;

use Yii;

/**
 * This is the model class for table "single_page".
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property int $date_create
 * @property int $date_update
 * @property string $desc
 * @property string $content
 * @property int $active
 * @property int $user_id
 */
class SinglePage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'single_page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'alias', 'date_create', 'date_update', 'user_id'], 'required'],
            [['date_create', 'date_update', 'active', 'user_id'], 'integer'],
            [['desc', 'content'], 'string'],
            [['name', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'desc' => 'Desc',
            'content' => 'Content',
            'active' => 'Active',
            'user_id' => 'User ID',
        ];
    }
}
