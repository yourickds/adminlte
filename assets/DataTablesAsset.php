<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class DataTablesAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/bower_components/datatables.net";

    public $js = [
        'js/jquery.dataTables.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}