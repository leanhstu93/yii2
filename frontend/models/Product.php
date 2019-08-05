<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\Base;
/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $name
 * @property string $sku
 * @property string $brand_name
 * @property string $desc
 * @property string $content
 * @property string $tags
 * @property int $count_view
 * @property int $user_id
 * @property int $date_update
 * @property string $seo_name
 * @property int $target_blank
 * @property string $image
 * @property int $option
 * @property int $quantity
 * @property double $weight
 * @property double $price
 * @property double $price_sale
 * @property int $status
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 */
class Product extends Base
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
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name', 'date_update', 'seo_name'], 'required'],
            [['name'], 'unique','message'=>'Sản phẩm này đã thêm'],
            [['desc','sku', 'content'], 'string'],
            [['count_view', 'user_id', 'date_update', 'target_blank', 'option', 'quantity'], 'integer'],
            [['weight', 'price', 'price_sale'], 'number'],
            [['sku'], 'string', 'max' => 50],
            [['brand_name'], 'string', 'max' => 100],
            [['tags', 'seo_name', 'image', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tiêu đề',
            'sku' => 'Sku',
            'brand_name' => 'Thương hiệu',
            'desc' => 'Mô tả',
            'content' => 'Nội dung',
            'tags' => 'Tags',
            'count_view' => 'Lượt xem',
            'user_id' => 'User ID',
            'date_update' => 'Ngày cập nhật',
            'seo_name' => 'Seo Name',
            'target_blank' => 'Target Blank',
            'image' => 'Hình ảnh',
            'option' => 'Đặc điểm',
            'quantity' => 'Số lượng',
            'weight' => 'Weight',
            'price' => 'Price',
            'price_sale' => 'Price Sale',
            'active' => 'Hoạt động',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
        ];
    }

    public function search($params) {
        $query = Product::find();

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

    /**
     * @return array
     */
    public static function listActive()
    {
        return [
            self::STATUS_ACTIVE => 'Hoạt động',
            self::STATUS_INACTIVE => 'Ngưng hoạt động',
        ];
    }

    /**
     * @return array
     */
    public static function listOption()
    {
        return [
            self::OPTION_HOT => 'Hot',
            self::OPTION_NEW => 'Mới',
        ];
    }

    public function getCategory() {
        return $this->hasMany(ProductCategory::className(), ['id' => 'category_id'])
            ->viaTable('rl_product_category', ['product_id' => 'id']);
    }
    public function getCategoryIds()
    {

        $data = $this->hasMany(ProductCategory::className(), ['id' => 'category_id'])
            ->viaTable('rl_product_category', ['product_id' => 'id'])->select('name,id')->asArray()->all();

        $result = array_column($data,'id');
        $this->category_ids = $result;

    }
}
