<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Tarifas;
use frontend\models\Bitacora;
use frontend\models\TarifasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TarifasController implements the CRUD actions for Tarifas model.
 */
class TarifasController extends Controller
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
        $model->modulo='Tarifas';
        $model->codUsuario=$user;
        $model->save();
    }

    /**
     * Lists all Tarifas models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('view-tarifas')||Yii::$app->user->can('create-tarifas')||
            Yii::$app->user->can('update-tarifas')||Yii::$app->user->can('delete-tarifas')) {
            $searchModel = new TarifasSearch();
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
     * Displays a single Tarifas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('view-tarifas')||Yii::$app->user->can('create-tarifas')||
            Yii::$app->user->can('update-tarifas')||Yii::$app->user->can('delete-tarifas')) {

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
     * Creates a new Tarifas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('create-tarifas')) {
            $model = new Tarifas();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $this->Bitacora('Create');
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
     * Updates an existing Tarifas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('update-tarifas')) {
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
     * Deletes an existing Tarifas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('delete-tarifas')) {
           // $this->findModel($id)->delete();
            $model = $this->findModel($id);
            $model->estado='0';
            $model->save();
            $this->Bitacora('Deletes');
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('error','Usuario sin privilegios');
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Tarifas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tarifas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tarifas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
