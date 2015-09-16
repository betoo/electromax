<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'emp_nombre')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'emp_num_cel')->textInput() ?>

    <?= $form->field($model, 'emp_num_tel')->textInput() ?>

    <?= $form->field($model, 'emp_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_twitter')->textInput(['maxlength' => true]) ?>

    

     <?php
      // A block file picker button with custom icon and label
      echo FileInput::widget([
                    'model' => $model,
                    'attribute' => 'emp_galeria[]',
                    'options' => ['multiple' => true],
                    'pluginOptions' => [
                        'showCaption' => false,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-primary btn-block',
                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                        'browseLabel' =>  'Upload Receipt'
                    ],
                    'options' => ['accept' => 'image/*']
                ]);
   ?>

    <?= $form->field($model, 'emp_nosotros')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agreagr' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
