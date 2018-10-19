<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class BootstrapColorpickerAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/bower_components/bootstrap-colorpicker/dist";

    public $css = [
        'css/bootstrap-colorpicker.min.css',
    ];

    public $js = [
        'js/bootstrap-colorpicker.min.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}