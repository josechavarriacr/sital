<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Usuarios';
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

    <div class="row">
        <div class="col-lg-4">
            <h2>Usuarios</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>
                <div class="row">
                    <div class="col-lg-4">
                     <?= Html::a('<i class="glyphicon glyphicon-user"></i>', ['/usuarios/index'], ['class'=>'btn btn-primary btn btn-block']) ?>
                 </div>
             </div>
         </div>
         <div class="col-lg-4">

            <h2>Extensiones</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>
                <div class="row">
                    <div class="col-lg-4">

                        <?= Html::a('<i class="glyphicon glyphicon-phone-alt"></i>', ['/extensiones/index'], ['class'=>'btn btn-primary btn btn-block']) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <h2>Departamentos</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                    <div class="row">
                        <div class="col-lg-4">
                            <?= Html::a('<i class="glyphicon glyphicon-briefcase"></i>', ['/departamentos/index'], ['class'=>'btn btn-primary btn btn-block']) ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
