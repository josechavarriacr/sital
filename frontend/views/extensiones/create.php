<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Extensiones */

$this->title = 'Crear extensiones';
$this->params['breadcrumbs'][] = ['label' => 'Extensiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extensiones-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
		]) ?>

	</div>
