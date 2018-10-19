<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class MorrisAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/bower_components/morris.js";

    public $css = [
        'morris.css',
    ];

    public $js = [
        'morris.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yourickds\adminlte\assets\RaphaelAsset'
    ];
}