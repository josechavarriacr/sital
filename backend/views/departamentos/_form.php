<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model frontend\models\Departamentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departamentos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?= $form->field($model, 'codUsuario')->dropDownList(
        ArrayHelper::map(Usuarios::find()->all(),'codigo','nombre'),
        ['prompt'=>'Selecione al usuario']
        )?>

    <?= $form->field($model, 'nombreDepartamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
