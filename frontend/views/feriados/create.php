<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Feriados */

$this->title = 'Crear feriados';
$this->params['breadcrumbs'][] = ['label' => 'Feriados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feriados-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
		]) ?>

	</div>
