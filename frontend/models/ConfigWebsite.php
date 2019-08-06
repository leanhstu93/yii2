<?php

namespace app\models;

use frontend\models\Base;
use Yii;

/**
 * This is the model class for table "config_website".
 *
 * @property int $id
 * @property string $setting
 */
class ConfigWebsite extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config_website';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['setting'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'setting' => 'Setting',
        ];
    }
}
