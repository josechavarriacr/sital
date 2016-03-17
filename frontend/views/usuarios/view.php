<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Usuarios */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn btn-lg']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
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
                'id',
                'nombre',
                'email:email',
                'username',
                'estado',
           /* 'password_hash',
            'password_reset_token',
            'auth_key',
            'status',
            'created_at',
            'updated_at',*/
            ],
            ]) ?>
        </div>
    </div>
</div>
