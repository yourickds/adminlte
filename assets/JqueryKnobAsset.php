<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class JqueryKnobAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/bower_components/jquery-knob/js";

    public $js = [
        'jquery.knob.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}