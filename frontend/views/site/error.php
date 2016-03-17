<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Se ha producido el error anterior, mientras que el servidor Web se procesando su solicitud.
    </p>
    <p>
        Póngase en contacto con nosotros si usted piensa que esto es un error en el servidor. Gracias.
    </p>

</div>
