<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

/* @var $this yii\web\View */

use yourickds\adminlte\assets\AdminlteAsset;
use yourickds\adminlte\assets\FontAwesomeAsset;
use yourickds\adminlte\assets\IoniconsAsset;
use yourickds\adminlte\assets\FastClickAsset;
use yourickds\adminlte\assets\BootstrapSliderAsset;

$this->title = 'AdminLTE 2 | UI Sliders';

FontAwesomeAsset::register($this);
IoniconsAsset::register($this);
FastClickAsset::register($this);
//Common Assets * Можно вынести в layouts но нужно будет все изображения перенести в папку @web *
$bundle = AdminlteAsset::register($this);
$this->params['bundle'] = $bundle;
BootstrapSliderAsset::register($this);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sliders
            <small>range sliders</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">UI</a></li>
            <li class="active">Sliders</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Bootstrap Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row margin">
                            <div class="col-sm-6">
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">

                                <p>data-slider-id="red"</p>
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="blue">

                                <p>data-slider-id="blue"</p>
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="green">

                                <p>data-slider-id="green"</p>
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="yellow">

                                <p>data-slider-id="yellow"</p>
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="aqua">

                                <p>data-slider-id="aqua"</p>
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">

                                <p style="margin-top: 10px">data-slider-id="purple"</p>
                            </div>
                            <div class="col-sm-6 text-center">
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="vertical"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="vertical"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="blue">
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="vertical"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="green">
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="vertical"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="yellow">
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="vertical"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="aqua">
                                <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="vertical"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$script = <<<JS
$(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').slider()
  })
JS;
$this->registerJs($script);
?>