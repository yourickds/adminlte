<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\assets;

use yii\web\AssetBundle;

class FullcalendarAsset extends AssetBundle
{
    public $sourcePath = "@vendor/yourickds/adminlte/bower_components/fullcalendar/dist";

    public $css = [
        'fullcalendar.min.css',
        ['fullcalendar.print.min.css', 'media' => 'print'],
    ];

    public $js = [
        'fullcalendar.min.js',
    ];

    public $depends = [
        'yourickds\adminlte\assets\MomentAsset'
    ];
}