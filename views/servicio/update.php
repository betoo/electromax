<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Servicio */

$this->title = 'Modificar: ' . ' ' . $model->ser_servicio;
$this->params['breadcrumbs'][] = ['label' => 'Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ser_id, 'url' => ['view', 'id' => $model->ser_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
