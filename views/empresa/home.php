<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Carousel;
/* @var $this yii\web\View */
/* @var $model app\models\Empresa */

?>

<div class="row">
    <div class="empresa-view content-views col-md-12 center-block ">
        <?php 
            echo Carousel::widget([
                'items' => [
                    // the item contains only the image
                    '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg"/>',
                    // equivalent to the above
                    ['content' => '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg"/>'],
                    // the item contains both the image and the caption
                    [
                        'content' => '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-03.jpg"/>',
                        'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                    ],
                ]
            ]);
         ?>
        <div class="clear"></div>

    </div>
    <div class="trabajos col-md-12">
        <?php foreach ($servicio as $key => $value): ?>

            <div class=" col-md-3 col-xs-12 col-sm-6 col-lg-3">
                <div class="content-views">
                    <a href='<?= Yii::$app->getUrlManager()->createAbsoluteUrl("../servicio/".$value->ser_id) ?>'>
                        <div class="content-img col-md-12 ">
                            <?= Html::img(Yii::$app->getUrlManager()->createAbsoluteUrl("../".$value->ser_imagen), ['alt' => 'logo electromax', 'class'=>'img-thumbnail']) ?>
                        </div>
                        <h2>
                            <?php echo ucwords(mb_strtolower( $value->ser_servicio,"UTF-8" ) )?>
                        </h2>
                        <div class="clear"></div>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
        <div class="clear"></div>
    </div>
</div>