<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\Member;

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
class News extends Base
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
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        /**
         * Setup your sorting attributes
         * Note: This is setup before the $this->load($params)
         * statement below
         */
//        $dataProvider->setSort([
//            'attributes'=>[
//                'id',
//                'name',
//            ]
//        ]);

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

    public function getUrlAll()
    {
        $model = Router::find()->where(['type' => Router::TYPE_NEWS_PAGE])->one();
        return Yii::$app->homeUrl .$model->seo_name;
    }

    public static function getDataByCustomSetting($key)
    {
        $custom = Custom::getSettingCustomTemplate();
        $custom_news =  (object)$custom[Custom::KEY_NEWS_CATEGORY][$key];

        $result = [
            'data' => null,
            'category' => null
        ];

        $result = (object) $result;
        if(!empty($custom_news->data)) {
            $result->category = NewsCategory::find()->where(['id' => $custom_news->data, 'active' => 1])->one();
            if($custom_news->limit == 1) {
                $result->data = self::find()->where(['category_id' => $custom_news->data, 'active' => 1])->one();
            } elseif ($custom_news->limit == 0) {
                $result->data = self::find()->where(['category_id' => $custom_news->data, 'active' => 1])->orderBy('id DESC')->all();
            } else {
                $result->data = self::find()->where(['category_id' => $custom_news->data, 'active' => 1])->limit($custom_news->limit)->orderBy('id DESC')->all();
            }

            return $result;
        }
    }
    public function getSeoName()
    {
        $model = Router::find()->where(['id_object' => $this->id,'type' => Router::TYPE_NEWS])->one();
        return $model->seo_name;
    }

    public function getUrl()
    {
        return Yii::$app->homeUrl .$this->getSeoName();
    }
    public function listMapLanguage()
    {
        return [
            'name' => 'name',
            'desc' => 'desc',
            'content' => 'content',
            'meta_title' => 'meta_title',
            'meta_desc' => 'meta_desc',
            'meta_keyword' => 'meta_keyword',
        ];
    }

    public function getUser() {
        return $this->hasMany(Member::className(), ['id' => 'user_id'])->select('username')->one();
    }

    public function getCategory() {
        return $this->hasMany(NewsCategory::className(), ['id' => 'category_id'])->select('name,id')->one();
    }
}
