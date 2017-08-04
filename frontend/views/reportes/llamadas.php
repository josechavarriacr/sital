<?php

use yii\helpers\Html;
use \fruppel\googlecharts\GoogleCharts;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\widgets\Growl;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RolesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Llamadas';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
['class' => 'yii\grid\SerialColumn','header'=>'#', 
'headerOptions' => ['width' => '10'],
],
['attribute'=>'Troncal', 'label'=>'Extensiones','format'=>'raw', 'hAlign'=>'left', 'width'=>'100px'],
['attribute'=>'Total', 'label'=>'Llamadas totales','format'=>'raw', 'hAlign'=>'middle', 'width'=>'100px'],
];
Yii::$app->view->params['inicio'] = $inicio;
Yii::$app->view->params['final'] = $final;

$connection = Yii::$app->getDb();
$command = $connection->createCommand("call GetLlamadas('$inicio','$final')");
$result = $command->queryAll();
$rowCount= count($result);  
$data[0] = array('Extensiones', 'Llamadas');    
foreach($result as $res){$data[] = array($res['Troncal'],(int)$res['Total']);}
$data = json_encode($data);
  echo $data;
echo $this->params['inicio'];
echo '<br/>';
echo $this->params['final'];
?>

<div class="row">
  <div class="col-lg-9">
    <div id="columnchart_material" style="max-width: 900px; height: 500px;"></div>
    <div class="img-responsive" id="toolbar_div"></div>
  </div>

  <div class="col-lg-3">
    <?= Growl::widget([
      'type' => Growl::TYPE_SUCCESS,
      'title' => 'Llamadas!',
      'icon' => 'glyphicon glyphicon-ok-sign',
      'body' => 'Generando gráfica.',
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

  <!--   <?= ExportMenu::widget([
      'columns' => $gridColumns,
      'dataProvider' => $dataProvider,
      'fontAwesome' => false,
      'stream' => false, // this will automatically save the file to a folder on web server
      'streamAfterSave' => true, // this will stream the file to browser after its saved on the web folder 
      'deleteAfterSave' => true, // this will delete the saved web file after it is streamed to browser,
      'target' => '_blank', 
      'dropdownOptions' => [
      'label' => 'Exportar',
      'class' => 'btn btn-info',
      ],
      'filename' => 'reporte_' . date('Y-m-d_H-i-s')
      ]);
      ?> -->

      <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-fullscreen"> Llamadas totales</i>  </h3>'.'De '.$inicio.' a '.$final,
        'type'=>'info',
        'footer'=>false
        ],
        ]);?>
      </div>
    </div>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    google.load("visualization", "1.1", {packages:["bar"]});
    google.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable(<?=$data?>);
      var options = {
        chart: {
          title: 'Reporte de llamadas',
          subtitle: 'Llamadas entrantes y salientes',
        }
      };
      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
      chart.draw(data, options);
    }

    function drawToolbar() {
      var components = [
      {type: 'igoogle', datasource: 'https://spreadsheets.google.com/tq?key=pCQbetd-CptHnwJEfo8tALA',
      gadget: 'https://www.google.com/ig/modules/pie-chart.xml',
      userprefs: {'3d': 1}},
      {type: 'html', datasource: 'https://spreadsheets.google.com/tq?key=pCQbetd-CptHnwJEfo8tALA'},
      {type: 'csv', datasource: 'https://spreadsheets.google.com/tq?key=pCQbetd-CptHnwJEfo8tALA'},
      {type: 'htmlcode', datasource: 'https://spreadsheets.google.com/tq?key=pCQbetd-CptHnwJEfo8tALA',
      gadget: 'https://www.google.com/ig/modules/pie-chart.xml',
      userprefs: {'3d': 1},
      style: 'width: 800px; height: 700px; border: 3px solid purple;'}
      ];

      var container = document.getElementById('toolbar_div');
      google.visualization.drawToolbar(container, components);
    };

    $(document).ready(function () {
      $(window).resize(function(){
        drawChart();
      });
    });
    </script>  

  </div>
