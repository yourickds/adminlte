<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class AdminlteAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/dist";

    public $css = [
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.css',
    ];

    public $js = [
        'js/adminlte.min.js',
//        'js/pages/dashboard.js',
//        'js/demo.js'
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}