<?php

namespace backend\modules\products\controllers;

use Yii;
use backend\modules\products\models\Product;
use backend\modules\products\models\ProductSearch;
use backend\modules\images\models\Image;
use backend\modules\producttypes\models\ProductType;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete','logout'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
//    public function actionIndex()
//    {
//        $searchModel = new ProductSearch();
//        $productModel = new Product();
//        $imageModel = new Image();
//        $producttypeModel = new ProductType();
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'productModel' => $productModel,
//            'imageModel' => $imageModel,
//            'producttypeModel' => $producttypeModel,
//        ]);
//    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
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
        $imageModel = new Image();
        $producttypeModel = new ProductType();

        if ($model->load(Yii::$app->request->post()) && $imageModel->load(Yii::$app->request->post()) && $model->save()) {
            $images = UploadedFile::getInstances($imageModel, 'base_url');
            foreach($images as $image){
                $imageModelSave = new Image();
              if(!empty($image)){
                  $image->saveAs(Yii::$app->basePath . '/uploads/' . md5($image->baseName) . '.' . $image->extension);
                  $imageModelSave->base_url = md5($image->baseName) . '.' . $image->extension;
                  $imageModelSave->name = $image->baseName;
                  $imageModelSave->productId = $model->id;
                  $imageModelSave->save(false);
//                  var_dump($imageModelSave->id);
                  
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
//            $producttypeNames = $producttypeModel->getAllProducttypeName();
//            var_dump($producttypeNames);
//            return $this->render('create', [
//                'model' => $model,
//                'imageModel' => $imageModel,
//                'producttypeModel' => $producttypeModel,
//            ]);
            $items = ArrayHelper::map(Producttype::find()->all(),'product_type_name','product_type_name');
            return $this->render('create', [
                'model' => $model,
                'imageModel' => $imageModel,
                'producttypeModel' => $producttypeModel,
                'items' => $items,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
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
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
