<?php

namespace app\controllers;

use Yii;
use app\models\Contacto;
use app\models\Empresa;
use app\models\ContactoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * ContactoController implements the CRUD actions for Contacto model.
 */
class ContactoController extends Controller
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

    /**
     * Lists all Contacto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContactoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contacto model.
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
     * Creates a new Contacto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
      public function actionCreate()
    {
        $model = new Contacto();
        if ($model->load(Yii::$app->request->post())) {
            $emp=Empresa::findOne(1);

            $model->attachment = UploadedFile::getInstance($model,'attachment');
            if ($model->attachment) {
                $time=time();
                $model->attachment->saveAs("attachments/".$time.'.'.$model->attachment->extension);
                $model->attachment="attachments/".$time.'.'.$model->attachment->extension;
                

            }

            if (!empty($model->attachment  )) {
                $value = Yii::$app->mailer->compose()
                    ->setFrom([$emp->emp_mail =>$emp->emp_nombre])
                    ->setTo([$model->reciver_email,$emp->emp_mail])
                    ->setSubject($model->subject)
                    ->setHtmlBody('Nombre: '.$model->reciver_name.'<br> Asunto: '.$model->subject.'<br> Mensaje: '.$model->content)
                    ->attach($model->attachment)
                    ->send();
            }else{
                $value = Yii::$app->mailer->compose()
                    ->setFrom([$emp->emp_mail =>$emp->emp_nombre])
                    ->setTo($model->reciver_email)
                    ->setSubject($model->subject)
                    ->setHtmlBody($model->reciver_name.'<br>'.$model->subject.'<br>'.$model->content)
                    ->send();
            }
            $model->save();
            return $this->redirect(['view','id'=> $model->id]);
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Contacto model.
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
     * Deletes an existing Contacto model.
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
     * Finds the Contacto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contacto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contacto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
