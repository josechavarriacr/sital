<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Roles;

/* @var $this yii\web\View */
/* @var $model frontend\models\Permisos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permisos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?= $form->field($model, 'codRoll')->dropDownList(
        ArrayHelper::map(Roles::find()->all(),'codigo','rol'),
        ['prompt'=>'Selecione el Rol']
        )?>

    <?= $form->field($model, 'modulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ver')->checkbox() ?>

    <?= $form->field($model, 'crear')->checkbox() ?>

    <?= $form->field($model, 'modificar')->checkbox() ?>

    <?= $form->field($model, 'eliminar')->checkbox() ?>

    <?= $form->field($model, 'estado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
