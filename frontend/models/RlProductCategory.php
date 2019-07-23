<?php

namespace frontend\models;

use Yii;
use frontend\models\ProductCategory;
/**
 * This is the model class for table "rl_product_category".
 *
 * @property int $id
 * @property int $product_id
 * @property int $category_id
 */
class RlProductCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rl_product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'category_id'], 'required'],
            [['product_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'category_id' => 'Category ID',
        ];
    }

}
