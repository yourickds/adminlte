<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class BootstrapDataTablesAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/bower_components/datatables.net-bs";

    public $css = [
        'css/dataTables.bootstrap.min.css'
    ];

    public $js = [
        'js/dataTables.bootstrap.min.js',
    ];

    public $depends = [
        'yourickds\adminlte\assets\DataTablesAsset'
    ];
}