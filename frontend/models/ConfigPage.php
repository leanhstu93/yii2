<?php

namespace frontend\models;

use Yii;
use frontend\models\Base;

/**
 * This is the model class for table "config_page".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property int $type
 * @property string $desc
 * @property string $conten
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 * @property int $status
 * @property string $image
 * @property string $tags
 */
class ConfigPage  extends Base
{

    const TYPE_HOME = 99;
    const TYPE_PRODUCT = 1;
    const TYPE_NEWS = 7;
    const TYPE_GALLERY_IMAGE = 9;
    const TYPE_CONTACT = 11;
    const STATUS_INACTIVE = 3;
    const STATUS_ACTIVE = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config_page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
        {
        return [
            [['name','seo_name', 'type'], 'required'],
            [['type', 'status'], 'integer'],
            [['desc', 'conten', 'meta_title', 'meta_desc', 'meta_keyword'], 'string'],
            [['name', 'tags' ,'image','seo_name'], 'string', 'max' => 255],
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
            'seo_name' => 'Seo Name',
            'type' => 'Type',
            'desc' => 'Mô tả',
            'conten' => 'Nội dung',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
            'status' => 'Trạng thái',
            'image' => 'Hình ảnh',
            'tags' => 'Tags',
        ];
    }

    public static function listStatus()
    {
        return [
            self::STATUS_ACTIVE => 'Hoạt động',
            self::STATUS_INACTIVE => 'Ngưng hoạt động',
        ];
    }

    public function getSeoName()
    {
        $model = Router::find()->where(['id_object' => $this->id,'type' => Router::TYPE_PRODUCT_PAGE])->one();
        return $model->seo_name;
    }

    public function getUrl()
    {
        return Yii::$app->homeUrl .$this->getSeoName();
    }

    public function getPageConfig($type)
    {
        $model = self::find()->where(['type' => $type])->one();
        return $model;
    }

    public function getTags()
    {
        $arrTags = explode(',', $this->tags);
        return $arrTags;
    }
}
