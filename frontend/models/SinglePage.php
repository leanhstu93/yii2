<?php

namespace frontend\models;

use frontend\models\Base;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "single_page".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property int $date_create
 * @property int $date_update
 * @property string $desc
 * @property string $content
 * @property int $active
 * @property int $user_id
 */
class SinglePage extends Base
{

    const STATUS_INACTIVE = 3;
    const STATUS_ACTIVE = 1;
    const OPTION_NEW = 1;
    const OPTION_HOT = 3;
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
            [['name', 'seo_name' ,'date_create', 'date_update', 'user_id'], 'required'],
            [['date_create', 'date_update', 'active', 'user_id', 'count_view'], 'integer'],
            [['desc', 'content'], 'string'],
            [['name', 'seo_name','tags','image'], 'string', 'max' => 255],
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
            'image' => 'Hình ảnh',
            'tags' =>'tags',
            'seo_name' => 'Đường dẫn',
            'date_create' => 'Ngày tạo',
            'date_update' => 'Ngày cập nhật',
            'desc' => 'Mô tả',
            'content' => 'Nội dung',
            'active' => 'Active',
            'count_view' => 'Lượt xem',
            'user_id' => 'User ID',
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
}
