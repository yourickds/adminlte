<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class FlotPieAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/bower_components/Flot";

    public $js = [
        'jquery.flot.pie.js',
    ];

    public $depends = [
        'yourickds\adminlte\assets\FlotAsset'
    ];
}