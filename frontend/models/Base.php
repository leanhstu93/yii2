<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\Router;

class Base extends \yii\db\ActiveRecord
{
    public static function processSeoName($seo_name,$id = null)
    {
        if (empty($id)) {
            $model = Router::find()->where(['seo_name' => $seo_name])->one();
        } else {
            $model = Router::find()->where(['seo_name' => $seo_name])->andWhere('id_object != :id_object',['id_object'=>$id])->one();
        }

        while ($model != null) {
            $seo_name = $seo_name.'-'.time().rand(10,99);
            if (empty($id)) {
                $model = Router::find()->where(['seo_name' => $seo_name])->one();
            } else {
                $model = Router::find()->where(['seo_name' => $seo_name])->andWhere('id_object != :id_object',['id_object'=>$id])->one();
            }
        }

        return $seo_name;
    }

    /**
     * @return array
     */
    public static function listActive()
    {
        return [
            1 => 'Có',
            0=> 'Không',
        ];
    }
}
