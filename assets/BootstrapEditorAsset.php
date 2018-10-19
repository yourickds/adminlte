<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class BootstrapEditorAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/plugins/bootstrap-wysihtml5";

    public $css = [
        'bootstrap3-wysihtml5.min.css',
    ];

    public $js = [
        'bootstrap3-wysihtml5.all.min.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}