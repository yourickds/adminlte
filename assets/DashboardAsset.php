<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class DashboardAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/dist";

    public $js = [
        'js/pages/dashboard.js',
    ];
    public $depends = [
        'yourickds\adminlte\assets\AdminlteAsset',
    ];
}