<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/c.css',
    ];
    public $js = [

        'https://yandex.st/jquery/2.2.3/jquery.min.js',
        'https://api-maps.yandex.ru/2.1/?apikey=851ac3ff-c32e-4d89-bfd4-45f02e48618a&lang=ru_RU',


        'http://code.jquery.com/jquery-1.8.3.js',

        'js/remove.js',
        'js/jquery.maskedinput.js'


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
