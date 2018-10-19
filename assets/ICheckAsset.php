<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class ICheckAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/plugins/iCheck";

    public $css = [
        'all.css',
    ];

    public $js = [
        'icheck.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}