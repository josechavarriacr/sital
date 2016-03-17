<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Extensiones */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
	<div class="col-lg-5">

		<div class="extensiones-form">
			<?php $form = ActiveForm::begin(); ?>
			<?= $form->field($model, 'numero')->textInput() ?>
			<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'estado')->checkbox() ?>
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success btn btn-block' : 'btn btn-primary btn btn-block']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
