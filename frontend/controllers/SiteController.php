<?php
namespace frontend\controllers;

use frontend\models\Bill;
use frontend\models\BillDetail;
use frontend\models\GalleryImage;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\Product;
use frontend\models\ProductCategory;
use frontend\models\ProductImage;
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
        if($alias == 'lien-he') {
            $type = 'contact';
        } else if($alias == 'gioi-thieu') {
            $type = 'about';
        } else if($alias == 'dich-vu') {
            $type = 'dich-vu';
        } else if($alias == 'cart') {
            $type = 'cart';
        } else if($alias == 'checkout') {
            $type = 'checkout';
        } else if($alias == 'save-bill') {
            $type = 'save-bill';
        } else if($alias == 'save-bill-noti') {
            $type = 'save-bill-noti';
        } else {
            $model = Router::find()->where(['seo_name' => $alias])->one();
            $type = $model->type;
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
                case Router::TYPE_NEWS:
                    $res = $this->actionGetNewsDetail($model->id_object);
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
                case 'save-bill':
                    $res = $this->saveBill();
                    break;
                case 'cart':
                    $res['data'] = [
                        'data' => [],
                        'bread' => [
                            ['name' => 'Giỏ hàng', 'link' => 'javascrip:;'],
                            ['name' => 'Trang chủ', 'link' => '/'],
                        ]
                    ];
                    $res['file'] = 'cart';
                    break;
                case 'checkout':
                    $res['data'] = [
                        'data' => [],
                        'bread' => [
                            ['name' => 'Thanh toán', 'link' => 'javascrip:;'],
                            ['name' => 'Trang chủ', 'link' => '/'],
                        ]
                    ];
                    $res['file'] = 'checkout';
                    break;
                case 'save-bill-noti':
                    $res['data'] = [
                        'data' => [],
                        'bread' => [
                            ['name' => 'Thanh toán', 'link' => 'javascrip:;'],
                            ['name' => 'Trang chủ', 'link' => '/'],
                        ]
                    ];
                    $res['file'] = 'noti-save-bill-success';
                    break;
            }

            return $this->render($res['file'],$res['data']);
        }
    }

    public function actionSaveBillNoti()
    {
        $res['data'] = [
            'data' => [],
            'bread' => [
                ['name' => 'Thanh toán', 'link' => 'javascrip:;'],
                ['name' => 'Trang chủ', 'link' => '/'],
            ]
        ];
        $res['file'] = 'noti-save-bill-success';
        return $this->render($res['file'],$res['data']);
    }

    /**
     * change ngon ngu
     */
    public function actionChangeLanguage($param) {
        $listLanguage = Yii::$app->params['listLanguage'];
        $session = Yii::$app->session;

        if (!empty($listLanguage[$param])) {
            $session->set('language', $param);
        }
        $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
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
            $bread[] = [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ];
            $bread = array_merge($bread, ProductCategory::getBreadCrumb($categories, []));
            # lấy danh mục con
            $categoryChild = ProductCategory::find()->where(['active'=>1,'parent_id' => $id_object])->all();
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
            $data = Product::find()->where($dataQuery)->andWhere(['active' => 1]);
            $countQuery = clone $data;
            $categories = [];
            // set breadcrumb
            $bread[] = [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ];
            //end set breadcrumb
            # lấy danh mục con
            $categoryChild = ProductCategory::find()->where(['active'=>1])->all();
        }


        # phan trang
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 15;
        $models = $data->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        # end phan trang

        return [
            'file' => 'product-category',
            'data' => [
                'data' => $models,
                'categories' => $categories,
                'categoryChild' => $categoryChild,
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

    public function actionGetNewsDetail($id_object)
    {
        $model = News::find()->where(['id'=>$id_object])->one();
        $newsCategory = NewsCategory::find()->where(['id' => $model->category_id])->all();
        # news lien quan
        $dataRL = News::find()->where(['category_id' => $model->category_id ])
            ->andWhere('id != :id',['id'=>$id_object])->limit(3)->all();
        #end news lien quan
        $bread[] = [
            'name' => 'Trang chủ',
            'link' => Yii::$app->homeUrl
        ];
        $bread = array_merge(
            $bread,
            NewsCategory::getBreadCrumb($newsCategory, [])
        );
        $bread[] = [
            'name' => $model->name,
            'link' => $model->getUrl()
        ];

        return [
            'file' => 'news-detail',
            'data' => [
                'data' => $model,
                'dataRL' => $dataRL,
                'bread' => $bread,
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
        $dataImages = ProductImage::find()->where(['product_id' => $id_object])->all();
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
                'dataImages' => $dataImages
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
                'bread' => $bread,
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
                'bread' => $bread,
            ]
        ];
    }

    public function actionAddCart()
    {
        $cart = Yii::$app->cart;
        $dataGet = Yii::$app->request->get();

        if (!empty($dataGet)) {
            switch ($dataGet['action']) {
                case 'add':
                    $product = Product::findOne($dataGet['product_id']);
                    Yii::$app->session->setFlash('success', "Thêm vào giỏ hàng thành công");
                    $cart->add($product, $dataGet['quantity']);
                    break;
                case 'update-all':
                    Yii::$app->session->setFlash('success', "Cập nhật giỏ hàng thành công");
                    foreach ($dataGet['products'] as $item) {
                        $product = Product::findOne($item['product_id']);
                        $cart->change($product->id, $item['quantity']);
                    }
                    break;
                case 'delete':

                break;
            }
        }
        $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function saveBill ()
    {
        $cart = Yii::$app->cart;
        $cartItems = $cart->getItems();
        $modelBill = new Bill();

        $dataGet = Yii::$app->request->get();

        if (!empty($cartItems) && !empty($dataGet)) {
            $modelBill->date_create = time();
            $modelBill->load($dataGet);
            $modelBill->status = Bill::STATUS_ACTIVE;
            $modelBill->total_cost = (string)$cart->getTotalCost();
            if ($modelBill->save()) {
              
                foreach ($cart->getItems() as $item) {
                    $product = $item->getProduct();
                    $modelBillDetail = new BillDetail();
                    $modelBillDetail->bill_id = $modelBill->id;
                    $modelBillDetail->product_id = $product->id;
                    $modelBillDetail->name = $product->name;
                    $modelBillDetail->image = $product->image;
                    $modelBillDetail->quantity = $item->getQuantity();
                    $modelBillDetail->price = $product->price;
                    $modelBillDetail->save();
                }
                $cart->clear();
                Yii::$app->session->setFlash('success', "Chúc mừng quý khách đặt hàng thành công, chúng tôi sẽ liên hệ quý khách sớm nhất!");
                Yii::$app->response->redirect(['/site/save-bill-noti'])->send();
                exit;
            }

        }
        $this->redirect(Yii::$app->homeUrl);
        return [
            'file' => 'index',
            'data' => [
                'data' => '',
                'bread' => [],
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
            'name' => 'Trang chủ',
            'link' => Yii::$app->homeUrl
        ];
        $bread[] = [
            'name' => 'Dịch vụ',
            'link' => 'javascrip:;'
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
