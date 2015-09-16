<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */

$this->title = 'Update Empresa: ' . ' ' . $model->emp_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->emp_id, 'url' => ['view', 'id' => $model->emp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-views col-md-12 center-block empresa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
