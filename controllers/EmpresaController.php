<?php

namespace app\controllers;

use Yii;
use app\models\Empresa;
use app\models\EmpresaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Servicio;
use app\models\ServicioSearch;
use yii\web\UploadedFile;
/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public $defaultAction = 'home';

    /**
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empresa model.
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
     * Creates a new Empresa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {

        $model = new Empresa();
        if ($model->load(Yii::$app->request->post())) {
            $emp_galeria = UploadedFile::getInstances($model, 'emp_galeria');
            $model->emp_galeria=null;
            print_r($model->getErrors());
            echo "<br>";
            $model->save();
            print_r($model->upload());
            exit();
            $model->upload();
            //$model->upload();
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save() ) {
                return $this->redirect(['view', 'id' => $model->emp_id]);
            }else{
                echo "eror";
            }
        } else {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->emp_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

     public function actionNosotros()
    {
        return $this->render('nosotros', [
            'model' => $this->findModel(1),
        ]);
    }

    public function actionContacto()
    {

        return $this->render('contacto', [
            'model' => Emails::find()->all(),
        ]);
    }

    public function actionHome()
    {   
        $id=1;
        return $this->render('home', [
            'empresa' => Empresa::findOne($id),
            'servicio' => Empresa::findOne($id)->getRelation('servicios')->where(['not in','ser_servicio','electronica'])->all(),
        ]);
    }
    /**
     * Deletes an existing Empresa model.
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
     * Finds the Empresa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empresa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
