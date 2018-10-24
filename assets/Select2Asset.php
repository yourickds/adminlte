<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class Select2Asset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/bower_components/select2/dist";

    public $css = [
        'css/select2.min.css',
    ];

    public $js = [
        'js/select2.full.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}