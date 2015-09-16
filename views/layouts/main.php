<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\AppAssetElectromax;

//AppAsset::register($this);
AppAssetElectromax::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <?php
    NavBar::begin([
        'brandLabel' =>  Html::img(Yii::$app->getUrlManager()->createAbsoluteUrl(Yii::$app->view->theme->baseUrl.'/img/'.'electromax2.png'), ['alt' => 'logo electromax', 'class'=>' ']) ,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar   navbar-transparent',/*navbar-fixed-top*/
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => ''],
        'items' => [
            ['label' => 'Home', 'url'       => ['../empresa/home']],
            ['label' => 'Nosotros', 'url'   => ['../empresa/nosotros']],
            ['label' => 'Electronica', 'url' => ['../servicio/electronica']],
            ['label' => 'Contacto', 'url'   => ['../contacto/create']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?> 
    <div class="wrap container-fluid"> 

        <div class="container container-home">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options'=>['class'=>'breadcrumb navbar-transparent'],
            ]) ?>
            
            <?= $content ?>
            
        </div>
    </div>
    <div class="clear"></div>
    <?= $this->render('@app/views/layouts/footer', $_params_) ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
