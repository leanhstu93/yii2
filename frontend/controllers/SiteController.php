<?php
namespace frontend\controllers;

use frontend\models\GalleryImage;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\Product;
use frontend\models\ProductCategory;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\SinglePage;
use frontend\models\VerifyEmailForm;
use Yii;
use \yii\base\View;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Router;
use frontend\models\ConfigPage;
use frontend\models\RlProductCategory;
use yii\data\Pagination;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRewriteUrl($alias)
    {
        if($alias != 'lien-he' && $alias != 'gioi-thieu' & $alias != 'dich-vu') {
            $model = Router::find()->where(['seo_name' => $alias])->one();
            $type = $model->type;
        } else if($alias == 'lien-he') {
            $type = 'contact';
        } else if($alias == 'gioi-thieu') {
            $type = 'about';
        } else if($alias == 'dich-vu') {
            $type = 'dich-vu';
        }
        if (!empty($type)) {

            switch ($type){
                case Router::TYPE_PRODUCT:
                    $res =  $this->getProductDetail($model->id_object);
                    break;
                case Router::TYPE_PRODUCT_CATEGORY:
                   $res =  $this->actionGetProductCategory($model->id_object);
                    break;
                case Router::TYPE_PRODUCT_PAGE :
                    $res =  $this->actionGetProductCategory(0);
                    break;
                case Router::TYPE_NEWS_CATEGORY :

                    $res = $this->actionGetNewsCategory($model->id_object);

                    break;
                case Router::TYPE_SINGLE_PAGE:
                    $res = $this->getSinglePage($model->id_object);
                    break;
                case Router::TYPE_GALLERY_IMAGE_PAGE:
                    $res = $this->getGalleryImage($model->id_object);
                    break;
                case Router::TYPE_GALLERY_IMAGE:
                    $res = $this->getGalleryImageDetail($model->id_object);
                    break;
                case Router::TYPE_NEWS_PAGE:
                    $res = $this->actionGetNewsCategory(0);
                    break;
                case 'video' :
                    $this->actionVideo();
                    break;
                case 'contact':
                    $res = $this->getContact();
                    break;
                case 'about':
                    $res = $this->getAbout();
                    break;
                case 'dich-vu':
                    $res = $this->getAllSecrvice();
                    break;
            }
            return $this->render($res['file'],$res['data']);
            exit('ok');
        }
    }

    /**
     * hàm lấy danh sách sp theo dm
     */
    public function actionGetProductCategory($id_object = 0)
    {
        $this->layout = 'main';
        $myRlProductCategory = new RlProductCategory();
        if ($id_object > 0) {
            $arrIds = $myRlProductCategory->getProductIds($id_object);
            $data = Product::find()->where(['in', 'id', $arrIds]);

            $countQuery = clone $data;

            $categories = ProductCategory::find()->where(['id' => $id_object])->one();
            // set breadcrumb
            $bread = ProductCategory::getBreadCrumb($categories, []);
            $bread[] = [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ];
        } else {
            # get all
            $data = Product::find();
            $countQuery = clone $data;
            $categories = [];
            // set breadcrumb
            $bread[] = [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ];
        }
        //end set breadcrumb

        # phan trang
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 18;
        $models = $data->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        # end phan trang

        return [
            'file' => 'product-category',
            'data' => [
                'data' => $models,
                'categories' => $categories,
                'bread' => $bread,
                'pages' =>$pages
            ]
        ];
    }

    /**
     * hàm lấy danh sách sp theo dm
     */
    public function actionGetNewsCategory($id = 0)
    {
        $this->layout = 'main';

        if ($id > 0) {
            $arrIds = [$id];
            $newsCategory = NewsCategory::find()->where(['parent_id' => $id])->all();
             NewsCategory::getIdsChild($newsCategory,$arrIds);
            $data = Product::find()->where(['in', 'id', $arrIds]);
            $countQuery = clone $data;
            $categories = NewsCategory::find()->where(['id' => $id])->one();
            // set breadcrumb
            $bread = NewsCategory::getBreadCrumb($categories, []);
            $bread[] = [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ];

        } else {
            # get all
            #query
            $dataQuery = [];
            $dataGet = Yii::$app->request->get();
            if (!empty($dataGet['keyword'])) {
                $dataQuery = [
                    'like', 'name', $dataGet['keyword']
                ];
            }

            $data = News::find()->where($dataQuery)->andWhere(['active' => 1]);
            $countQuery = clone $data;
            $categories = [];
            // set breadcrumb
            $bread[] = [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ];
        }
        //end set breadcrumb
        $newsHot = News::find()->where(['option' => News::OPTION_HOT])->limit(3)->all();
        # phan trang
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 18;
        $models = $data->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        # end phan trang

        return [
            'file' => 'news-category',
            'data' => [
                'data' => $models,
                'categories' => $categories,
                'bread' => $bread,
                'newsHot' => $newsHot,
                'pages' =>$pages
            ]
        ];
    }

    public function getProductDetail($id_object)
    {
        $myRlProductCategory = new RlProductCategory();

        $model = Product::find()->where(['id'=>$id_object])->one();

        # sp lien quan
        $idsRL = $myRlProductCategory->getProductIdsRL($id_object);
        $dataRL = Product::find()->where(['in','id', $idsRL])->limit(3)->all();

        #end sp lien quan
        $bread = [
            [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ],
            [
                'name' => $model->name,
                'link' => $model->getUrl()
            ],

        ];

        return [
            'file' => 'product-detail',
            'data' => [
                'data' => $model,
                'dataRL' => $dataRL,
                'bread' => $bread,
            ]
        ];
    }
    public function getSinglePage($id_object)
    {
        $models = SinglePage::find()->where(['id'=>$id_object])->one();

        $bread = [
            [
                'name' => $models->name,
                'link' => $models->getUrl()
            ],
            [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ],

        ];
        return [
            'file' => 'single-page',
            'data' => [
                'data' => $models,
                'bread' => $bread,
            ]
        ];
    }

    public function getContact()
    {
        $bread = [
            [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ],
            [
                'name' => 'Liên hệ',
                'link' => 'javascrip:;'
            ],

        ];
        return [
            'file' => 'contact',
            'data' => [
                'bread' => array_reverse($bread),
            ]
        ];
    }

    public function getAbout()
    {
        $bread = [
            [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ],
            [
                'name' => 'Giới thiệu',
                'link' => 'javascrip:;'
            ],

        ];
        return [
            'file' => 'about',
            'data' => [
                'data' => '',
                'bread' => array_reverse($bread),
            ]
        ];
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function getAllSecrvice()
    {
        $categories = ProductCategory::find()->where(['parent_id' => 0])->all();
        $bread[] = [
            'name' => 'Dịch vụ',
            'link' => 'javascrip:;'
        ];

        $bread[] = [
            'name' => 'Trang chủ',
            'link' => Yii::$app->homeUrl
        ];

        return [
            'file' => 'product-category-all-custom',
            'data' => [
                'data' => $categories,
                'bread' => $bread,
            ]
        ];
    }

    public function getGalleryImage()
    {
        $configPage = new ConfigPage();
        $modelConfigPage = $configPage->getPageConfig(ConfigPage::TYPE_GALLERY_IMAGE);
        $data = GalleryImage::find()->where(['active' => 1]);
        $countQuery = clone $data;
        $bread[] = [
            'name' => $modelConfigPage->name,
            'link' => 'javascrip:;'
        ];
        $bread[] = [
            'name' => 'Trang chủ',
            'link' => Yii::$app->homeUrl
        ];

        # phan trang
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 18;
        $models = $data->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        # end phan trang


        return [
            'file' => 'gallery-image',
            'data' => [
                'data' => $models,
                'bread' => $bread,
                'page' => $modelConfigPage,
                'pages' => $pages,
            ]
        ];
    }

    public function getGalleryImageDetail($id)
    {
        $data = GalleryImage::find()->where(['active' => 1,'id' => $id])->one();
        $dataRL = GalleryImage::find()->where('id != :id' , ['id' => $id])->andWhere(['active' => 1])->limit(6)->all();
        $bread[] = [
            'name' => $data->name,
            'link' => 'javascrip:;'
        ];
        $bread[] = [
            'name' => 'Trang chủ',
            'link' => Yii::$app->homeUrl
        ];


        return [
            'file' => 'gallery-image-detail',
            'data' => [
                'data' => $data,
                'bread' => $bread,
                'dataRL' => $dataRL
            ]
        ];
    }
}
