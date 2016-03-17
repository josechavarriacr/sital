<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use frontend\models\Tarifas;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clientes */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-lg-5">
        <div class="clientes-form">

            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'codigo')->textInput() ?>
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'empresa')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'codTarifas')->widget(Select2::classname(),[
                'data'=>ArrayHelper::map(Tarifas::find()->all(),'codigo','nombre'),
                'language'=>'es',
                'options'=>['placeholder'=>'Selecione tarifa...'],
                'pluginOptions'=>[
                'allowClear'=>false
                ],
                ]);?>
                <?= $form->field($model, 'estado')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success btn btn-block' : 'btn btn-primary btn btn-block']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
