<?php

namespace frontend\models;

use Yii;
use frontend\models\Base;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property string $desc
 * @property int $category_id
 * @property string $content
 * @property int $active
 * @property int $date_create
 * @property int $user_id
 * @property int $date_update
 */
class Banner extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'seo_name','date_update', 'user_id', 'date_create'], 'required'],
            [['desc', 'content'], 'string'],
            [['category_id', 'date_update', 'active','user_id', 'date_create'], 'integer'],
            [['name', 'seo_name'], 'string', 'max' => 255],
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
            'seo_name' => 'Đường dẫn',
            'desc' => 'Mo tả',
            'category_id' => 'Danh mục',
            'content' => 'Nội dung',
            'active' => 'Active',
            'date_create' => 'Ngày tạo',
            'date_update' => 'Ngày cập nhật',
            'user_id' => 'user_id'
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
            'active'=>$this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        // filter by order amount

        return $dataProvider;
    }
}
