<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class SparklineAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/bower_components/jquery-sparkline/dist";

    public $js = [
        'jquery.sparkline.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}