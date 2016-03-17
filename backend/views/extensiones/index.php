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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Extensiones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codigo',
            'numero',
            'estado:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>