<?php

namespace backend\controllers;

use iutbay\yii2kcfinder\KCFinder;
use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public function init() {
        parent::init();
        $kcfOptions = array_merge(KCFinder::$kcfDefaultOptions, [
            'uploadURL' => Yii::getAlias('@web').'/upload',
            'access' => [
                'files' => [
                    'upload' => true,
                    'delete' => true,
                    'copy' => true,
                    'move' => true,
                    'rename' => true,
                ],
                'dirs' => [
                    'create' => true,
                    'delete' => true,
                    'rename' => true,
                ],
            ],
        ]);
// Set kcfinder session options
        Yii::$app->session->set('KCFINDER', $kcfOptions);
    }
}