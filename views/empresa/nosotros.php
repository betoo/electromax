<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */

$this->title = $model->emp_nombre       ;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-view content-views col-md-12 center-block ">
    <h1 class="titulo">Nosotros</h1>
    <div class="quines-somos-img col-md-5 col-xs-12 col-sm-6 ">
    </div>
    <div class="descrip-emergencia col-md-7 col-xs-12 col-sm-6 ">
        <p>
            <?= Html::encode($model->emp_nosotros) ?>
        </p>
        <div class="clear"></div>
    </div>
    

    <?/*= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'emp_id',
            'emp_num_cel',
            'emp_num_tel',
            'emp_mail',
            'emp_nosotros:ntext',
            'emp_nombre',
        ],
    ]) */?>
    <div class="clear"></div>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->emp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->emp_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>