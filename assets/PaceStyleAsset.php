<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class PaceStyleAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/plugins/pace";

    public $css = [
        'pace.min.css',
    ];
}