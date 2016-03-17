<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Departamentos;
use frontend\models\Bitacora;
use frontend\models\DepartamentosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DepartamentosController implements the CRUD actions for Departamentos model.
 */
class DepartamentosController extends Controller
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
        $model->modulo='Departamentos';
        $model->codUsuario=$user;
        $model->save();
    }

    /**
     * Lists all Departamentos models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('view-departamentos')||Yii::$app->user->can('create-departamentos')||
            Yii::$app->user->can('update-departamentos')||Yii::$app->user->can('delete-departamentos')) {
            $searchModel = new DepartamentosSearch();
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
     * Displays a single Departamentos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('view-departamentos')||Yii::$app->user->can('create-departamentos')||
            Yii::$app->user->can('update-departamentos')||Yii::$app->user->can('delete-departamentos')) {

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
     * Creates a new Departamentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('create-departamentos')) {
            $model = new Departamentos();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $this->Bitacora('Create');
                return $this->redirect(['view', 'id' => $model->codigo]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    ]);
            }
        } else {
            Yii::$app->session->setFlash('error','usuario sin privilegios');
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Departamentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('update-departamentos')) {
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
            Yii::$app->session->setFlash('error','usuario sin privilegios');
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Departamentos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('delete-departamentos')) {
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
     * Finds the Departamentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Departamentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Departamentos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
