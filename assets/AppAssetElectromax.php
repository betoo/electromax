<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetElectromax extends AssetBundle
{
    public $sourcePath = '@themes/electromax';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/screen-xs.css',
        'css/screen-sm.css',
        'css/screen-md.css',
        'css/screen-lg.css',
    ];
    public $js = [
        'js/funciones.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
