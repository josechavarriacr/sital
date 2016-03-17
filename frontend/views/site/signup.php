<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Crear usuarios';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['/usuarios/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="usuarios-create">

  <h1><?= Html::encode($this->title) ?></h1>

  <div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id')->label('Código')?>
        <?= $form->field($model, 'nombre') ?>
        <?= $form->field($model, 'username')->label('Usuario') ?>
        <?= $form->field($model, 'email')->label('Correo electrónico')?>
        <?= $form->field($model, 'password')->label('Contraseña')->passwordInput() ?>
        <?= $form->field($model, 'estado')->checkbox() ?>
        <?php 
        $authItems = ArrayHelper::map($authItems,'name','description');
        ?>
        <?=$form->field($model, 'permissions')->label('Permisos de acceso')->checkboxList($authItems); ?>

        <div class="form-group">
            <?= Html::submitButton('Create', ['class' => 'btn-block btn btn-success', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
