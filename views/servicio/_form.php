<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Servicio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicio-form ">

    <?php $form = ActiveForm::begin(['options' =>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'ser_servicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ser_imagen')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'empresa_emp_id')->textInput() ?>

    <?= $form->field($model, 'serviciocol')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
