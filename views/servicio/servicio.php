<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Servicio */

$this->title = $model->ser_servicio;
$this->params['breadcrumbs'][] = ['label' => 'Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-views ">
    
    <h1 class="titulo">
        <p>
            
            <?= strtoupper(Html::encode($this->title)) ?>
        </p>
    </h1>
    <div class="content-img col-md-5 col-xs-12 col-sm-12 col-lg-5">
        <?= Html::img(Yii::$app->getUrlManager()->createAbsoluteUrl('../'.$model->ser_imagen), ['alt' => 'logo electromax', 'class'=>'img-thumbnail']) ?>
    </div>
     <div class="descrip-emergencia col-md-5 col-xs-12 col-sm-12 col-lg-7">
        <p>
            <?= Html::encode($model->serviciocol) ?>
        </p>
    </div>
    <div class="clear"></div>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ser_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ser_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
