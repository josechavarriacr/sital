<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Ingrese su usuario y contraseña para entrar al sistema:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput()->label('Nombre de usuario') ?>
            <?= $form->field($model, 'password')->passwordInput()->label('contraseña') ?>
            <?= $form->field($model, 'rememberMe')->checkbox()->label('Recordar') ?>

            <div style="color:#999;margin:1em 0">
                Olvidé mi contraseña <?= Html::a('recuperar', ['site/request-password-reset']) ?>.
            </div> 

            <div class="form-group">
                <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            
        </div>
    </div>
</div>
