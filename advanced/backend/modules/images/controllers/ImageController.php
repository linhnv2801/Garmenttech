<?php

namespace backend\modules\images\controllers;

use Yii;
use backend\modules\images\models\Image;
use backend\modules\images\models\ImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\Json;

/**
 * ImageController implements the CRUD actions for Image model.
 */
class ImageController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'deleterows' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'logout'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'logout', 'deleterows'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Image models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Image();

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model,
        ]);
    }

    /**
     * Displays a single Image model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Image model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Image();
        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'base_url');
            if (!empty($image)) {
                $image->saveAs(Yii::$app->basePath . '/uploads/' . md5($image->baseName. time()) . '.' . $image->extension);
                $model->base_url = md5($image->baseName) . '.' . $image->extension;
                $model->name = $image->baseName;
                $model->save(false);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Image model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $image = UploadedFile::getInstance($model, 'base_url');
            if (!empty($image)) {
                $image->saveAs(Yii::$app->basePath . '/uploads/' . md5($image->baseName) . '.' . $image->extension);
                $model->base_url = md5($image->baseName) . '.' . $image->extension;
                $model->name = $image->baseName;
                $model->save(false);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Image model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete() {
//        $this->findModel($id)->delete();
        if (Yii::$app->request->post('keylist')) {
            $keys = \yii\helpers\Json::decode($_POST['keylist']);
            foreach ($keys as $key) {
                $this->findModel($key)->deleteAll();
            }
            echo Json::encode([
                'status' => 'success',
            ]);
        } else {
            echo Json::encode([
                'status' => 'error',
            ]);
        }
//        return $this->redirect(['index']);
    }

    public function actionDeleterows() {
        if (Yii::$app->request->isAjax) {
            $keylist = Yii::$app->request->post();
            if (!is_array($keylist) || count($keylist) === 0)
                return 'error';
            foreach ($keylist as $keys) {
                $str = Json::encode($keys) . " ";
                foreach($keys as $key){
                    if(unlink('uploads/' . $this->findModel($key)->base_url)){
                        $this->findModel($key)->delete();                    
                    }else{
                        return 'error';
                    }
                }
            }
            return count($keylist);
        } else {
            return 'error';
        }
    }

    /**
     * Finds the Image model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Image the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
