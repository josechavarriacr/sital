<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tarifas */

$this->title = 'Crear tarifas';
$this->params['breadcrumbs'][] = ['label' => 'Tarifas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarifas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
