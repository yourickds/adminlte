<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class DatePickerAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/bower_components/bootstrap-datepicker/dist";

    public $css = [
        'css/bootstrap-datepicker.min.css',
    ];

    public $js = [
        'js/bootstrap-datepicker.min.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}