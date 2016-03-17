<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\widgets\Growl;
use kartik\grid\GridView;

$this->title = 'Llamadas';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns1 = [
['class' => 'yii\grid\SerialColumn','header'=>'#', 
'headerOptions' => ['width' => '10'],
],
['attribute'=>'Nombre', 'label'=>'Extensiones entrantes','format'=>'raw', 'hAlign'=>'left', 'width'=>'240px'],
['attribute'=>'Numero', 'label'=>'Número','format'=>'raw', 'hAlign'=>'middle', 'width'=>'180px'],
['attribute'=>'Entrantes', 'label'=>'Llamadas','format'=>'raw', 'hAlign'=>'middle', 'width'=>'110px'],
['attribute'=>'Aire', 'label'=>'Duración aire','format'=>'raw', 'hAlign'=>'middle', 'width'=>'110px'],
['attribute'=>'CostoAire', 'label'=>'Costo aire','format'=>'raw', 'hAlign'=>'middle', 'width'=>'110px'],
['attribute'=>'Efectiva', 'label'=>'Duración efectiva','format'=>'raw', 'hAlign'=>'middle', 'width'=>'110px'],
['attribute'=>'CostoEfectiva', 'label'=>'Costo efectiva','format'=>'raw', 'hAlign'=>'middle', 'width'=>'110px'],
];

$gridColumns2 = [
['class' => 'yii\grid\SerialColumn','header'=>'#', 
'headerOptions' => ['width' => '10'],
],
['attribute'=>'Nombre', 'label'=>'Extensiones salientes','format'=>'raw', 'hAlign'=>'left', 'width'=>'240px'],
['attribute'=>'Numero', 'label'=>'Número','format'=>'raw', 'hAlign'=>'middle', 'width'=>'180px'],
['attribute'=>'Salientes', 'label'=>'Llamadas','format'=>'raw', 'hAlign'=>'middle', 'width'=>'110px'],
['attribute'=>'Aire', 'label'=>'Duración aire','format'=>'raw', 'hAlign'=>'middle', 'width'=>'110px'],
['attribute'=>'CostoAire', 'label'=>'Costo aire','format'=>'raw', 'hAlign'=>'middle', 'width'=>'110px'],
['attribute'=>'Efectiva', 'label'=>'Duración efectiva','format'=>'raw', 'hAlign'=>'middle', 'width'=>'110px'],
['attribute'=>'CostoEfectiva', 'label'=>'Costo efectiva','format'=>'raw', 'hAlign'=>'middle', 'width'=>'110px'],
];

Yii::$app->view->params['inicio'] = $inicio;
Yii::$app->view->params['final'] = $final;
?>

<div class="roles-general">

  <?= Growl::widget([
    'type' => Growl::TYPE_INFO,
    'title' => 'Tarificación!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'Detalle de extensiones.',
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
    'showProgressbar' => false,
    'placement' => [
    'from' => 'top',
    'align' => 'right',
    ]
    ]
    ]);?>

  <?= Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Llamadas recibidas!',
    'icon' => 'glyphicon glyphicon-phone-alt',
    'body' => 'Reporte de llamadas recibidas.',
    'showSeparator' => true,
    'delay' => 1000,
    'pluginOptions' => [
    'showProgressbar' => false,
    'placement' => [
    'from' => 'top',
    'align' => 'right',
    ]
    ]
    ]);?>

  <?= Growl::widget([
    'type' => Growl::TYPE_DANGER,
    'title' => 'Llamadas realizadas',
    'icon' => 'glyphicon glyphicon-earphone',
    'body' => 'Reporte de llamadas realizadas.',
    'showSeparator' => true,
    'delay' => 2000,
    'pluginOptions' => [
    'showProgressbar' => false,
    'placement' => [
    'from' => 'top',
    'align' => 'right',
    ]
    ]
    ]);?>

    <h4>Extensiones</h4>

    <?=GridView::widget([
      'dataProvider' => $dataProvider1,
      'columns' => $gridColumns1,
      'panel' => [
      'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-phone-alt"> Extensiones entrantes</i>  </h3>'.'De '.$inicio.' a '.$final,
      'type'=>'success',
      'footer'=>false
      ],
      ]);?>  

    <?=GridView::widget([
      'dataProvider' => $dataProvider2,
      'columns' => $gridColumns2,
      'panel' => [
      'heading'=>'<h3 class="panel-title"><i class="glyphicon  glyphicon-earphone"> Extensiones salientes</i>  </h3>'.'De '.$inicio.' a '.$final,
      'type'=>'danger',
      'footer'=>false
      ],
      ]);?>   


    </div>


