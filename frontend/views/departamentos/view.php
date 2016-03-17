<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Departamentos */

$this->title = $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamentos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->codigo], ['class' => 'btn btn-primary btn btn-lg']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->codigo], [
            'class' => 'btn btn-danger btn-lg',
            'data' => [
            'confirm' => '¿Seguro que quieres borrar este elemento?',
            'method' => 'post',
            ],
            ]) ?>
        </p>
        <div class="row">
            <div class="col-lg-5">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                    'codigo',
                    'nombreDepartamento',
                    'codExtension',
                    'estado:boolean',
                    ],
                    ]) ?>
                </div>
            </div>
        </div>
