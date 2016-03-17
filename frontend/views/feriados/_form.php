<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Tarifas;

/* @var $this yii\web\View */
/* @var $model frontend\models\Feriados */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-lg-5">
        <div class="feriados-form">

            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'fechas')->widget(
                DatePicker::className(), [
                'inline' => false, 
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
                ]
                ]);?>
            <?= $form->field($model, 'codTarifas')->widget(Select2::classname(),[
                'data'=>ArrayHelper::map(Tarifas::find()->all(),'codigo','nombre'),
                'language'=>'es',
                'options'=>['placeholder'=>'Seleccione tarifa...'],
                'pluginOptions'=>[
                'allowClear'=>true
                ],
                ]) ?>
                <?= $form->field($model, 'estado')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn btn-block' : 'btn btn-primary btn btn-block']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
