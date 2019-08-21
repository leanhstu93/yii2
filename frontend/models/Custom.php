<?php

namespace frontend\models;

use frontend\models\Base;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "custom".
 *
 * @property int $id
 * @property string $data
 */
class Custom extends Base
{

    const KEY_IMAGE = 'CUSTOM_IMAGE';
    const KEY_SINGLE_PAGE = 'CUSTOM_SINGLE_PAGE';
    const KEY_NEWS_CATEGORY = 'CUSTOM_NEWS_CATEGORY';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'custom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'required'],
            [['data'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
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
     * lấy dữ liệu setting
     */
    public static function getSettingcustom()
    {
        $custom =  \Yii::$app->params['settingTemplate'];
        $model = self::findOne(1);
        $data = json_decode($model->data,true);

        if(!empty($data)) {
            $custom = array_replace_recursive($custom, json_decode($model->data,true));
        }
        return $custom;
    }
}
