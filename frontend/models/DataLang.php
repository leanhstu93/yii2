<?php

namespace frontend\models;

use frontend\models\Base;
use Yii;

/**
 * This is the model class for table "data_lang".
 *
 * @property int $id
 * @property int $id_object
 * @property string $name
 * @property string $desc
 * @property string $content
 * @property int $type
 * @property string $code_lang
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 */
class DataLang extends Base
{
    const TYPE_PRODUCT=1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_object', 'name', 'type', 'code_lang'], 'required'],
            [['id_object', 'type'], 'integer'],
            [['desc', 'content'], 'string'],
            [['name', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
            [['code_lang'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_object' => 'Id Object',
            'name' => 'Name',
            'desc' => 'Desc',
            'content' => 'Content',
            'type' => 'Type',
            'code_lang' => 'Code Lang',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
        ];
    }
}
