<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class DaterangeAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/bower_components/bootstrap-daterangepicker";

    public $css = [
        'daterangepicker.css',
    ];

    public $js = [
        'daterangepicker.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yourickds\adminlte\assets\MomentAsset'
    ];
}