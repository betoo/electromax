<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index content-views col-md-12 center-block">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'emp_id',
            'emp_nombre',
            'emp_num_cel',
            'emp_num_tel',
            'emp_mail',
            //'emp_nosotros:ntext',
            // 'emp_facebook',
            // 'emp_twitter',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
