<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Troncales */

$this->title = 'Create Troncales';
$this->params['breadcrumbs'][] = ['label' => 'Troncales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="troncales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
