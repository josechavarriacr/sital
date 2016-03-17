<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
<div class="col-lg-5">

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id')->textInput() ?>
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
     <?= $form->field($model, 'estado')->checkbox() ?>
   <!-- <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'created_at')->textInput() ?>
    <?= $form->field($model, 'updated_at')->textInput() ?>-->

        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
