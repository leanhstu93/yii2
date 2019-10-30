<?php
namespace frontend\controllers;

use frontend\models\ConfigPage;
use frontend\models\Custom;
use frontend\models\GalleryImage;
use frontend\models\Router;
use frontend\models\SinglePage;
use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use frontend\models\Company;
use frontend\models\Menu;
use frontend\models\Product;
use frontend\models\News;
use frontend\models\ProductCategory;
use frontend\models\NewsCategory;

class BaseController extends Controller
{

    public function buildMenu ()
    {
        $menu = Menu::find()->where(['id' => 1])->one();
        $res = [];

        foreach (json_decode($menu->data,true) as $value) {
            extract($value);
            /**
             * @var $id
             * @var $name
             * @var $module
             * @var $link
             * @var $id_object
             */

            if (strpos($module,'single-page')) {
               $module = 'single-page';
            }
            switch ($module) {
                case 'product':
                    $productCate = ProductCategory::find()->where(['active' => 1])->all();
                    $submenu = [];

                    foreach ($productCate as $item) {
                        $submenu[] = [
                            'name' => $item->name,
                            'link' => $item->getUrl()
                        ];
                    }

                    $config =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_PRODUCT])->one();
                    $myProduct = new Product();

                    $res[] = [
                        'name' => $config->name,
                        'link' => $myProduct->getUrlAll(),
                        'module' => $module,
                        'sub_menu' => $submenu
                        ];
                    break;
                case 'home':
                    $res[] = [
                        'name' => $name,
                        'module' => $module,
                        'link' => Url::base(true) . '/'
                    ];
                    break;
                case 'news':
                    $newsCate = NewsCategory::find()->where(['active' => 1,'parent_id' => 0])->all();
                    $submenu = [];

                    foreach ($newsCate as $item) {
                        $newsCate1 = NewsCategory::find()->where(['active' => 1,'parent_id' => $item->id])->all();
                        $submenu1 = [];
                        foreach ($newsCate1 as $item1) {
                            $newsCate2 = NewsCategory::find()->where(['active' => 1,'parent_id' => $item1->id])->all();
                            foreach ($newsCate2 as $item2) {
                                $submenu2[] = [
                                    'name' => $item2->name,
                                    'link' => $item2->getUrl(),
                                ];
                            }
                            $submenu1[] = [
                                'name' => $item1->name,
                                'link' => $item1->getUrl(),
                                'sub_menu' => $newsCate2
                            ];
                        }

                        $submenu[] = [
                            'name' => $item->name,
                            'link' => $item->getUrl(),
                            'sub_menu' => $submenu1,
                        ];
                    }
                    $myNews = new News();
                    $config =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_NEWS])->one();

                    $res[] = [
                        'name' => $config->name,
                        'link' => $myNews->getUrlAll(),
                        'module' => $module,
                        'sub_menu' => $submenu
                    ];
                    break;
                case 'single-page':
                    $idSinglePage = preg_replace('/mn_single_page_/','',$id);
                    $singlePage = SinglePage::find()->where(['active' => 1,'id' =>$idSinglePage ])->one();
                    if (!empty($singlePage)) {
                        $res[] = [
                            'name' => $singlePage->name,
                            'link' => $singlePage->getUrl(),
                            'module' => $module,
                        ];
                    }
                    break;
                case 'contact':
                    $res[] = [
                        'name' => 'Liên hệ',
                        'link' =>  Url::base(true) . '/lien-he',
                        'module' => $module,
                    ];
                break;
                case 'gallery-image':
                    $myGallery = new GalleryImage();
                    $res[] = [
                        'name' => $name,
                        'link' =>  $myGallery->getUrlAll(),
                        'module' => $module,
                    ];
                    break;
            }
        }
        return $res;
    }

    public function init()
    {
        parent::init();
        $this->layout = 'main';
        $company = Company::find()->where(['id' => 1])->one();
        $custom = new Custom();

        Yii::$app->view->params['menu'] =  $this->buildMenu();
        Yii::$app->view->params['company'] =  $company;
        $dataLang = $custom->getSettingCustomLanguage();

        Yii::$app->view->params['lang'] = (object) $dataLang['vi'];
        $this->view->title = $company->name;
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $company->meta_keyword
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $company->meta_desc
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

}