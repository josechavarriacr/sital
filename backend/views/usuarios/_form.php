<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Roles;
use frontend\models\Extensiones;

/* @var $this yii\web\View */
/* @var $model frontend\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?= $form->field($model, 'codRoll')->dropDownList(
        ArrayHelper::map(Roles::find()->all(),'codigo','rol'),
        ['prompt'=>'Selecione un rol']
        )?>

    <?= $form->field($model, 'codExtension')->dropDownList(
        ArrayHelper::map(Extensiones::find()->all(),'codigo','numero'),
        ['prompt'=>'Selecione una extensión']
    )?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contrasena')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
