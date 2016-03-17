<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

$this->title = 'Llamadas';
$this->params['breadcrumbs'][] = $this->title;
?>

</br>
</br>
</br>
<div class="row">
    <div class="col-lg-5">
        <div class="form">
            <?php $form = ActiveForm::begin([
                'enableClientValidation' => true,
                ]); ?>
            <?= $form->field($model, 'fechaInicio')->widget(
                DatePicker::className(), [
                'inline' => false, 
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
                ]
                ]);?>

            <?= $form->field($model, 'fechaFinal') ->widget(
                DatePicker::className(), [
                'inline' => false, 
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
                ]
                ]);?>

            <?php echo $form->field($model, 'reporte[]')->dropDownList(
                ['a' => 'Clientes', 'b' => 'Extensiones', 'c' => 'Troncales'],
                ['prompt'=>'Seleccione un reporte']); ?>

                <div class="form-group">
                    <?= Html::submitButton('<i class="glyphicon glyphicon-print"></i>', ['class' => 'btn btn-primary btn btn-lg']) ?>
                </div> 
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
