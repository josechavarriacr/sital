<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Clientes;
use frontend\models\Feriados;
use frontend\models\Troncales;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tarifas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarifas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?=$form->field($model,'codCliente')->dropDownList(
        ArrayHelper::map(Clientes::find()->all(),'codigo','nombre'),
        ['prompt'=>'Selecione al cliente']
    )?>

    <?= $form->field($model,'codFeriado')->dropDownList(
        ArrayHelper::map(Feriados::find()->all(),'codigo','descripcion'),
        ['prompt'=> 'Selecione la fecha']
    )?>

    <?= $form->field($model,'codTroncal')->dropDownList(
        ArrayHelper::map(Troncales::find()->all(),'codigo','nombre'),
        ['prompt'=>'Seleccione un feriado']
    )?>

    <?= $form->field($model, 'tiempo')->textInput() ?>

    <?= $form->field($model, 'precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
