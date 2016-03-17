<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
   <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['site/signup'],['data-method' => 'post','class' => 'btn btn-success btn btn-lg']). ' ' .
   Html::a('<i class="glyphicon glyphicon-refresh"></i>', ['index'], ['class' => 'btn btn-warning btn-lg']) ?>
 </p> 

 <?= GridView::widget([
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'rowOptions' => function($model){
    if ($model->estado==0) {
      return ['class'=>'danger'];
    } else {
      return ['class'=>'success'];
    }
  },
  'columns' => [
  ['class' => 'yii\grid\SerialColumn'],

  'id',
  'nombre',
  'email:email',
  'username',
  'estado',
            // 'password_hash',
            // 'password_reset_token',
            // 'auth_key',
            // 'status',
            // 'created_at',
            // 'updated_at',
  ['class' => 'yii\grid\ActionColumn',
  'template' => '{view}'
  ],
  ],
  ]); ?>

</div>
