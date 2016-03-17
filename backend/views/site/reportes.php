<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Reportes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

       <!-- -->
    </div>

    <div class="body-content">

        <div class="row">
        	  <div class="col-lg-3">
                <h2>Roles</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                 <?= Html::a('ver roles', ['/roles/index'], ['class'=>'btn btn-lg btn-success']) ?>
            </div>
            <div class="col-lg-3">
                <h2>Permisos</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                  <?= Html::a('ver permisos', ['/permisos/index'], ['class'=>'btn btn-lg btn-success']) ?>
            </div>
            <div class="col-lg-3">
                <h2>Extensiones</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                  <?= Html::a('ver extensiones', ['/extensiones/index'], ['class'=>'btn btn-lg btn-success']) ?>
            </div>
            <div class="col-lg-3">
                <h2>Usuarios</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                 <?= Html::a('ver usuarios', ['/usuarios/index'], ['class'=>'btn btn-lg btn-success']) ?>
            </div>
        </div>

    </div>
</div>
