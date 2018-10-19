<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class InputMaskAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/plugins/input-mask";

    public $js = [
        'jquery.inputmask.js',
        'jquery.inputmask.date.extensions.js',
        'jquery.inputmask.extensions.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}