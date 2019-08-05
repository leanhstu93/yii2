<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property int $category_id
 * @property int $order
 * @property string $image
 * @property string $desc
 * @property string $content
 * @property string $alias
 * @property string $tags
 * @property int $user_id
 * @property int $date_create
 * @property int $date_update
 * @property int $count_view
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 * @property int $active
 * @property int $option
 */
class News extends \yii\db\ActiveRecord
{
    public $images;
    public $category_ids;
    const STATUS_INACTIVE = 3;
    const STATUS_ACTIVE = 1;
    const OPTION_NEW = 1;
    const OPTION_HOT = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'seo_name', 'user_id', 'date_create', 'date_update', 'count_view'], 'required', 'message' => ' {attribute} không thể để trống'],
            [['category_id', 'order', 'user_id', 'date_create', 'date_update', 'count_view', 'active', 'option'], 'integer'],
            [['desc', 'content'], 'string'],
            [['name', 'seo_name', 'image', 'alias', 'tags', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
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
            'seo_name' => 'Đường dẫn',
            'category_id' => 'Category ID',
            'order' => 'Order',
            'image' => 'Image',
            'desc' => 'Desc',
            'content' => 'Content',
            'alias' => 'Alias',
            'tags' => 'Tags',
            'user_id' => 'User ID',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'count_view' => 'Count View',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
            'active' => 'Active',
            'option' => 'Option',
        ];
    }

    public function search($params) {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
        ]);

        /**
         * Setup your sorting attributes
         * Note: This is setup before the $this->load($params)
         * statement below
         */
        $dataProvider->setSort([
            'attributes'=>[
                'id',
                'name',
            ]
        ]);

        if (!($this->load($params))) {

            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'=>$this->id,
            'status'=>$this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);


        // filter by order amount

        return $dataProvider;
    }
}
