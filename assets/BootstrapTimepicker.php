<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class BootstrapTimepicker extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/plugins/timepicker";

    public $css = [
        'bootstrap-timepicker.min.css',
    ];

    public $js = [
        'bootstrap-timepicker.min.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}