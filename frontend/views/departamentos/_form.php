<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Extensiones;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Departamentos */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-lg-5">
        <div class="departamentos-form">

            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'nombreDepartamento')->textInput(['maxlength' => true]) ?>
            <?=$form->field($model, 'codExtension')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Extensiones::find()->all(),'codigo','nombre'),
                'language' => 'es',
                'options' => ['placeholder' => 'Seleccione extensión...'],
                'pluginOptions' => [
                'allowClear' => true
                ],
                ]);
                ?>
                <?= $form->field($model, 'estado')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success btn btn-block' : 'btn btn-primary btn btn-block']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
