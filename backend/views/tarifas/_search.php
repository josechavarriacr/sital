<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TarifasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarifas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'codCliente') ?>

    <?= $form->field($model, 'codFeriado') ?>

    <?= $form->field($model, 'codTroncal') ?>

    <?= $form->field($model, 'tiempo') ?>

    <?php // echo $form->field($model, 'precio') ?>

    <?php // echo $form->field($model, 'estado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
