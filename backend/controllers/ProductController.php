<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseController;
use frontend\models\Product;
use frontend\models\ProductImage;
use frontend\models\ConfigPage;
use frontend\models\RlProductCategory;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\MyHelpers;
/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel =  new Product();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' =>$searchModel
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
            $formData = Yii::$app->request->post();

            $model->user_id = Yii::$app->user->identity->id;
            $model->date_update = time();
            $model->count_view = 1;
            if (!empty($formData['product']['image'][0])) {
                $model->image = $formData['product']['image'][0];
                array_shift($formData['product']['image']);

            }
            if ($model->save()) {
                if (!empty($formData['product']['image'][0])) {
                    $this->saveProductImage($formData['Product']['images'], $model->id);
                }

                if (!empty($formData['Product']['category_ids'])) {
                    $this->saveProductCategory($formData['Product']['category_ids'], $model->id);
                }
                Yii::$app->session->setFlash('success', "Lưu thành công");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Lưu thất bại");
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        /**
         * @var Product $model
         */
        $model = $this->findModel($id);
        # lay danh sach hinh anh
        $modelProductImage = ProductImage::find()->select('image')->where(['product_id' => $id])->asArray()->all();
        $model->images = array_merge([$model->image],array_column($modelProductImage,'image'));

        # lay danh sach danh muc
        $model->getCategoryIds();

        if ($model->load(Yii::$app->request->post())) {
            $formData = Yii::$app->request->post();
            $model->date_update = time();
            if (!empty($formData['Product']['images'][0])) {
                $model->image = $formData['Product']['images'][0];

            }

            if ($model->save()) {
                if (!empty($formData['product']['image'][0])) {
                    $this->saveProductImage($formData['Product']['images'], $model->id);
                }

                if (!empty($formData['Product']['category_ids'])) {
                    $this->saveProductCategory($formData['Product']['category_ids'], $model->id);
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $data
     */
    private function saveProductImage($data,$id)
    {
        if (!empty($data)) {
            ProductImage::deleteAll(['product_id' => $id]);
            foreach ($data as $value) {
                $modelProductImage = new ProductImage();
                $modelProductImage->product_id = $id;
                $modelProductImage->image = $value;
                $modelProductImage->save();
            }

        }
    }

    /**
     * @param $data
     */
    private function saveProductCategory($data,$id)
    {
        if (!empty($data)) {
            RlProductCategory::deleteAll(['product_id' => $id]);

            foreach ($data as $value) {
                $modelRLProductCategory = new RlProductCategory();
                $modelRLProductCategory->product_id = $id;
                $modelRLProductCategory->category_id = $value;
                $modelRLProductCategory->save();
            }
        }
    }

    public function actionConfig()
    {
        if ($model =  ConfigPage::find()->where(['id' => ConfigPage::TYPE_PRODUCT])->one() === null) {
            $model = new ConfigPage();
            $model->type = ConfigPage::TYPE_PRODUCT;
        } else {
            $model =  ConfigPage::find()->where(['id' => ConfigPage::TYPE_PRODUCT])->one();
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Lưu thành công");

             } else {
                Yii::$app->session->setFlash('danger', "Lưu thất bại");
            }
            return $this->redirect(['config']);
        }

        return $this->render('config', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
