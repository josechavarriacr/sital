<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Departamentos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

    </div>

    <div class="body-content">

        <div class="row">
           <div class="col-lg-5">
            <h2>Deparamentos</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            </div>

            <div class="col-lg-5">
                <h2>Departments</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                    <?= Html::a('ver departamentos', ['/departamentos/index'], ['class'=>'btn btn-lg btn-success']) ?>
                </div>
            </div>

        </div>
    </div>
