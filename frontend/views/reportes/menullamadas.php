<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

$this->title = 'Llamadas';
$this->params['breadcrumbs'][] = $this->title;

$fechaInicio = date('Y-m-d', time() - 3600*24);
$fechaFin = date('Y-m-d', time());
?>

</br>
</br>
</br>
<div class="row">
    <div class="col-lg-5">
        <div class="form">
            <?php $form = ActiveForm::begin([]); ?>
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
                ])->error();?>
                <div class="form-group">
                    <?= Html::submitButton('<i class="glyphicon glyphicon-print"></i>', ['class' => 'btn btn-primary btn btn-lg']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

