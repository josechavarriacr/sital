<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Permisos */

$this->title = $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permisos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->codigo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'codRoll',
            'modulo',
            'ver:boolean',
            'crear:boolean',
            'modificar:boolean',
            'eliminar:boolean',
            'estado:boolean',
        ],
    ]) ?>

</div>
