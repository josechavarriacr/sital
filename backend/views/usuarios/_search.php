<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UsuariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'codRoll') ?>

    <?= $form->field($model, 'codExtension') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'contrasena') ?>

    <?php // echo $form->field($model, 'estado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
