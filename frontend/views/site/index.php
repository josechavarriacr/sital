<?php

/* @var $this yii\web\View */
use kartik\widgets\Growl;

$this->title = 'SITAL';
?>

<?= Growl::widget([
  'type' => Growl::TYPE_GROWL,
  'title' => '',
  'icon' => '/sital/logo.png',
  'iconOptions' => ['class'=>'img-circle pull-left'],
  'body' => 'soluciones integrales en el área de la tecnología de información y comunicaciones.',
  'showSeparator' => false,
  'delay' => 0,
  'pluginOptions' => [
  'icon_type'=>'image',
  'showProgressbar' => false,
  'placement' => [
  'from' => 'top',
  'align' => 'right',
  ],
  ]
  ]);?>

  <div class="site-index">

    <div class="jumbotron">
      <h1>SITAL</h1>
      <p class="lead">Sistema de Tarificación de Llamadas.</p>
    </div>

    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="/sital/frontend/images/blue.jpg" class="img-responsive" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Sign up today</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/sital/frontend/images/blue.jpg" class="img-responsive" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Learn more</a>
            </div>
          </div>
        </div>

        <div class="item">
          <img src="/sital/frontend/images/blue.jpg" class="img-reponsive" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Browse gallery</a>
            </div>
          </div>
        </div> 

      </div>

      <a class="left carousel-control" href="#myCarousel" 
      role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" 
    role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>


<div class="body-content">

  <div class="row">
    <div class="col-lg-4">
      <h2>Heading</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat.</p>
      </div>

      <div class="col-lg-4">
        <h2>Heading</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat.</p>
        </div>

        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat.</p>
          </div>

        </div>

      </div>
    </div>
