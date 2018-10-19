<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class BootstrapSliderAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/plugins/bootstrap-slider";

    public $css = [
        'slider.css',
    ];

    public $js = [
        'bootstrap-slider.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}