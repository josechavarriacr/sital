<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TarifasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tarifas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarifas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--     <p>
        <?= Html::a('class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

     <p>
       <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],['data-method' => 'post','class' => 'btn btn-success btn btn-lg']). ' ' .
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

            'codigo',
            'nombre',
            'tiempo',
            'precio',
            'estado:boolean',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}'
            ],
        ],
    ]); ?>

</div>
