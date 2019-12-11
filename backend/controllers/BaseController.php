<?php

namespace backend\controllers;

use frontend\models\DataLang;
use iutbay\yii2kcfinder\KCFinder;
use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public function saveDataLang($data, $id_object = 0,$type = DataLang::TYPE_PRODUCT)
    {
        if (empty($data)) {
            return false;
        }

        foreach ($data as $key => $item) {
            if ($dataLang = DataLang::find()->where(['id_object' => $id_object,'code_lang' => $key, 'type' => $type])->one()) {
                $dataLang->load($item,'');
            } else {
                $dataLang = new DataLang();
                $dataLang->load($item,'');
                $dataLang->code_lang = $key;
                $dataLang->id_object = $id_object;
                $dataLang->type = $type;
            }

            if (!$dataLang->save()) {
                debug($dataLang->errors);
            }
        }
        return true;
    }
}