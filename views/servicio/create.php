<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Servicio */

$this->title = 'Crear Servicio';
$this->params['breadcrumbs'][] = ['label' => 'Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-views col-md-12 center-block servicio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
