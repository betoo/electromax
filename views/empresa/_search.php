<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'emp_id') ?>

    <?= $form->field($model, 'emp_num_cel') ?>

    <?= $form->field($model, 'emp_num_tel') ?>

    <?= $form->field($model, 'emp_mail') ?>

    <?= $form->field($model, 'emp_nosotros') ?>

    <?php // echo $form->field($model, 'emp_nombre') ?>

    <?php // echo $form->field($model, 'emp_facebook') ?>

    <?php // echo $form->field($model, 'emp_twitter') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
