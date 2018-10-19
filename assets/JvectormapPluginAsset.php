<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class JvectormapPluginAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/plugins/jvectormap";

    public $js = [
        'jquery-jvectormap-1.2.2.min.js',
        'jquery-jvectormap-world-mill-en.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yourickds\adminlte\assets\JvectormapAsset'
    ];
}