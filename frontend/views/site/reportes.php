<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = 'Reportes';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-index">

  <!--  
  <div class="jumbotron">
   <h1>Congratulations!</h1>

    <p class="lead">You have successfully created your Yii-powered application.</p>
  -->
</div>

</br>
</br>
</br>
<div class="body-content">

  <?php
  Modal::begin([
    'header'=>'<h4>Reportes</h4>',
    'id'=>'modal',
    'size'=>'modal-sm',
    ]);

  echo "<div id='modalContent'></div>";

  Modal::end();
  ?>


  <div class="row">
    <div class="col-lg-6">
      <h2>Llamadas</h2>

      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
        fugiat nulla pariatur.</p>
        <div class="row">
          <div class="col-lg-3">

           <?= Html::a('<i class="glyphicon glyphicon-usd"></i>', ['/reportes/menullamadas'], ['class'=>'btn-primary btn btn-block']) ?>
           
         </div>
       </div>  
     </div>

     <div class="col-lg-6">
      <h2>General</h2>

      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
        fugiat nulla pariatur.</p>
        <div class="row">
          <div class="col-lg-3">

            <?= Html::a('<i class="glyphicon glyphicon-usd"></i>', ['/reportes/menugeneral'], ['class'=>'btn-primary btn btn-block']) ?>

          </div>
        </div>
      </div>

    </div>

  </div>
</div>
