<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Feriados */

$this->title = 'Update Feriados: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Feriados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'id' => $model->codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="feriados-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
		]) ?>

	</div>
