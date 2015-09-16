<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contacto */

$this->title = 'Contactar';
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="emails-create content-views col-md-12 center-block ">
	<h1 class="titulo"><?= Html::encode($this->title) ?></h1>
	<div class="col-md-5 col-xs-12 col-sm-6 ">
		<div class=" form-contacto">
            <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
        </div>
	</div>

	<div class="col-md-7 col-xs-12 col-sm-6 descrip-emergencia">
		<p>Al contrario del pensamiento popular, el texto de Loremica Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, "consecteur", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de "de Finnibus Bonorum et Malorum" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, "Lorem ipsum dolor sit amet..", viene de una linea en la sección 1.10.32</p>
	</div>
	<div class="clear"></div>

</div>
