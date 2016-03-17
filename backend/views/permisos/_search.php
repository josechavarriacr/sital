<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PermisosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permisos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'codRoll') ?>

    <?= $form->field($model, 'modulo') ?>

    <?= $form->field($model, 'ver')->checkbox() ?>

    <?= $form->field($model, 'crear')->checkbox() ?>

    <?php // echo $form->field($model, 'modificar')->checkbox() ?>

    <?php // echo $form->field($model, 'eliminar')->checkbox() ?>

    <?php // echo $form->field($model, 'estado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
