<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Clientes;
use frontend\models\Bitacora;
use frontend\models\ClientesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientesController implements the CRUD actions for Clientes model.
 */
class ClientesController extends Controller
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
        $model->modulo='Clientes';
        $model->codUsuario=$user;
        $model->save();
    }

    /**
     * Lists all Clientes models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('view-clientes')||Yii::$app->user->can('create-clientes')||
          Yii::$app->user->can('update-clientes')||Yii::$app->user->can('delete-clientes')){
            $searchModel = new ClientesSearch();
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
     * Displays a single Clientes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->Bitacora('View');
        if (Yii::$app->user->can('view-clientes')||Yii::$app->user->can('create-clientes')||
            Yii::$app->user->can('update-clientes')||Yii::$app->user->can('delete-clientes')){
            return $this->render('view', [
                'model' => $this->findModel($id),
                ]);
    } else {
        Yii::$app->session->setFlash('error','Usuario sin privilegios');
        return $this->redirect(['/site/index']);
    }
}

    /**
     * Creates a new Clientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->Bitacora('Create');
        if (Yii::$app->user->can('create-clientes')) {
            $model = new Clientes();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->codigo]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    ]);
            }
        } else {
            Yii::$app->session->setFlash('error','Usuario sin privilegios');
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Clientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('update-clientes')) {
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
     * Deletes an existing Clientes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('delete-clientes')) {
            //$this->findModel($id)->delete();
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
     * Finds the Clientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Clientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Clientes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
