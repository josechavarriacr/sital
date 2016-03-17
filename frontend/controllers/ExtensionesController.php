<?php

namespace frontend\controllers;

use Yii;
use mPDF;
use frontend\models\Extensiones;
use frontend\models\Bitacora;
use frontend\models\ExtensionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * ExtensionesController implements the CRUD actions for Extensiones model.
 */
class ExtensionesController extends Controller
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

    private function Bitacora($action){
        $user = \Yii::$app->user->identity->id;
        $model = new Bitacora();
        $model->accion=$action;
        $model->modulo='Extensiones';
        $model->codUsuario=$user;
        $model->save();
    }
    
    /**
     * Lists all Extensiones models.
     * @return mixed
     */
    public function actionIndex()
    {   
     if (Yii::$app->user->can('view-extensiones')||Yii::$app->user->can('create-extensiones')||
        Yii::$app->user->can('update-extensiones')||Yii::$app->user->can('delete-extensiones')) {

        $searchModel = new ExtensionesSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $this->Bitacora('Index');
    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        ]);
} else {
    Yii::$app->session->setFlash('error','Usuario sin privilegios');
    return $this->redirect(['/site/index']);
}
}

    /**
     * Displays a single Extensiones model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
     if (Yii::$app->user->can('view-extensiones')||Yii::$app->user->can('create-extensiones')||
        Yii::$app->user->can('update-extensiones')||Yii::$app->user->can('delete-extensiones')) {

        $this->Bitacora('View');
    return $this->render('view', [
        'model' => $this->findModel($id),
        ]);
} else {
    Yii::$app->session->setFlash('error','Usuario sin privilegios');
    return $this->redirect(['/site/index']);
}
}

    /**
     * Creates a new Extensiones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        if (Yii::$app->user->can('create-extensiones')) {
            $model = new Extensiones();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $this->Bitacora('Create');
                return $this->redirect(['view', 'id' => $model->codigo]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    ]);
            }
        }else{
            // throw new ForbiddenHttpException
            Yii::$app->session->setFlash('error','Usuario sin privilegios');
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Extensiones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('update-extensiones')) {
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $this->Bitacora('Update');
                return $this->redirect(['view', 'id' => $model->codigo]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    ]);
            }
        } else {
            Yii::$app->session->setFlash('error','Usuario sin privilegios');
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Extensiones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('delete-extensiones')) {
           // $this->findModel($id)->delete();
            $model = $this->findModel($id);
            $model->estado='0';
            $model->save();
            $this->Bitacora('Delete');
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('error','Usuario sin privilegios');
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Extensiones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Extensiones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Extensiones::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
