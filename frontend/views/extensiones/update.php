<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Extensiones */

$this->title = 'Update Extensiones: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Extensiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'id' => $model->codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="extensiones-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
		]) ?>

	</div>
