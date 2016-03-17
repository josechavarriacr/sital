<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ExtensionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Extensiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extensiones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
       <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],['data-method' => 'post','class' => 'btn btn-success btn btn-lg']). ' ' .
       Html::a('<i class="glyphicon glyphicon-refresh"></i>', ['index'], ['class' => 'btn btn-warning btn-lg']) ?>
   </p>

   <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'rowOptions' => function($model){
        if ($model->estado==0) {
            return ['class'=>'danger'];
        } else {
            return ['class'=>'success'];
        }
    },
    'columns' => [
    ['class' => 'yii\grid\SerialColumn'],
    'codigo',
    'numero',
    'nombre',
    'estado:boolean',
    ['class' => 'yii\grid\ActionColumn',
    'template' => '{view}'],
    ], 
    ]); ?>

</div>
