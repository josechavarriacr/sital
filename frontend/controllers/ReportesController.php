<?php

namespace frontend\controllers;

use Yii;
use mPDF;
use yii\web\Controller;
use frontend\models\Extensiones;
use frontend\models\Bitacora;
use frontend\models\ExtensionesSearch;
use yii\data\SqlDataProvider;
use yii\base\DynamicModel;

class ReportesController extends Controller
{

  private function Bitacora($action){
    $user = \Yii::$app->user->identity->id;
    $model = new Bitacora();
    $model->accion=$action;
    $model->modulo='llamadas';
    $model->codUsuario=$user;
    $model->save();
  }

  public function actionMenullamadas()
  {
    if (Yii::$app->user->can('create-reporte-llamada')) {
      $this->Bitacora('create-reporte-llamada');
      $model = new \yii\base\DynamicModel([ 'fechaInicio', 'fechaFinal']);
      $model->addRule(['fechaInicio','fechaFinal'], 'required');

      if($model->load(Yii::$app->request->post())){
        // do somenthing with model

        return $this->redirect(['llamadas','inicio'=>$model->fechaInicio,'final'=>$model->fechaFinal]);
      }
      //first log in
      return $this->render('menullamadas', ['model'=>$model]);
      
    } else {
           // throw new ForbiddenHttpException
      Yii::$app->session->setFlash('error','Usuario sin privilegios');
      return $this->redirect(['/site/index']);
    }
  }

  public function actionMenugeneral()
  {
    if (Yii::$app->user->can('create-reporte-llamada')) {
      $this->Bitacora('create-reporte-llamada');
      
      $model = new DynamicModel([ 'fechaInicio', 'fechaFinal','reporte']);
      $model->addRule(['fechaInicio','fechaFinal','reporte'], 'required');

      if($model->load(Yii::$app->request->post())){
        // do somenthing with model

        switch ($model->reporte[0]) {
          case 'a':
          return $this->redirect(['clientes','inicio'=>$model->fechaInicio,'final'=>$model->fechaFinal]);    
          break;

          case 'b':
          return $this->redirect(['extensiones','inicio'=>$model->fechaInicio,'final'=>$model->fechaFinal]);    
          break;

          case 'c':
          return $this->redirect(['troncales','inicio'=>$model->fechaInicio,'final'=>$model->fechaFinal]);    
          break;

          //Esto no debería pasar
          default: 
          return $this->render('menugeneral', ['model'=>$model]);
          break;
        }
      }

      //first log in
      return $this->render('menugeneral', ['model'=>$model]);

    } else {
           // throw new ForbiddenHttpException
      Yii::$app->session->setFlash('error','Usuario sin privilegios');
      return $this->redirect(['/site/index']);
    }
  }

  public function actionLlamadas($inicio, $final)
  {
    if (Yii::$app->user->can('create-reporte-llamada')) {
      $provider = new SqlDataProvider ([
        'sql' => "call GetLlamadas('$inicio','$final')",
        'pagination' => false,
        ]);
      $this->Bitacora('create-reporte-llamada');
      return $this->render('llamadas',['inicio'=> $inicio,'final'=> $final,'dataProvider' => $provider,]);
    } else {
           // throw new ForbiddenHttpException
      Yii::$app->session->setFlash('error','Usuario sin privilegios');
      return $this->redirect(['/site/index']);
    }
  }

  public function actionClientes($inicio, $final)
  {
    if (Yii::$app->user->can('create-reporte-general')) {

     $provider1 = new SqlDataProvider ([
      'sql' => "call GetClientesEntrantes('$inicio', '$final')",
      'pagination' => false,
      ]);

     $provider2 = new SqlDataProvider ([
      'sql' => "call GetClientesSalientes('$inicio', '$final')",
      'pagination' => false,
      ]);

     $this->Bitacora('create-reporte-general');
     return $this->render('clientes', ['inicio'=> $inicio,'final'=> $final, 'dataProvider1' => $provider1, 'dataProvider2' => $provider2]);
   } else {
           // throw new ForbiddenHttpException
    Yii::$app->session->setFlash('error','usuario sin privilegios');
    return $this->redirect(['/site/index']);
  }   
}

 public function actionTroncales($inicio, $final)
  {
    if (Yii::$app->user->can('create-reporte-general')) {

     $provider1 = new SqlDataProvider ([
      'sql' => "call GetTroncalesEntrantes('$inicio', '$final')",
      'pagination' => false,
      ]);

     $provider2 = new SqlDataProvider ([
      'sql' => "call GetTroncalesSalientes('$inicio', '$final')",
      'pagination' => false,
      ]);

     $this->Bitacora('create-reporte-general');
     return $this->render('troncales', ['inicio'=> $inicio,'final'=> $final, 'dataProvider1' => $provider1, 'dataProvider2' => $provider2]);
   } else {
           // throw new ForbiddenHttpException
    Yii::$app->session->setFlash('error','usuario sin privilegios');
    return $this->redirect(['/site/index']);
  }   
}
public function actionExtensiones($inicio, $final)
{
  if (Yii::$app->user->can('create-reporte-general')) {

   $provider1 = new SqlDataProvider ([
    'sql' => "call GetExtensionesEntrantes('$inicio', '$final')",
    'pagination' => false,
    ]);

   $provider2 = new SqlDataProvider ([
    'sql' => "call GetExtensionesSalientes('$inicio', '$final')",
    'pagination' => false,
    ]);

   $this->Bitacora('create-reporte-general');
   return $this->render('extensiones', ['inicio'=> $inicio,'final'=> $final, 'dataProvider1' => $provider1, 'dataProvider2' => $provider2]);
 } else {
           // throw new ForbiddenHttpException
  Yii::$app->session->setFlash('error','usuario sin privilegios');
  return $this->redirect(['/site/index']);
}   
}


}
