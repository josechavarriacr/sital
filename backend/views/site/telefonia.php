<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Telefonia';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

    </div>

    <div class="body-content">

        <div class="row">
        	  <div class="col-lg-3">
                <h2>Clientes</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <?= Html::a('ver clientes', ['/clientes/index'], ['class'=>'btn btn-lg btn-success']) ?>
            </div>
            <div class="col-lg-3">
                <h2>Feriados</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <?= Html::a('ver feriados', ['/feriados/index'], ['class'=>'btn btn-lg btn-success']) ?>
            </div>
            <div class="col-lg-3">
                <h2>Troncales</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <?= Html::a('ver troncales', ['/troncales/index'], ['class'=>'btn btn-lg btn-success']) ?>
            </div>
            <div class="col-lg-3">
                <h2>Tarifas</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <?= Html::a('ver tarifas', ['/tarifas/index'], ['class'=>'btn btn-lg btn-success']) ?>
            </div>
        </div>

    </div>
</div>
