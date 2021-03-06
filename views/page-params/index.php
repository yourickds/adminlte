<?php
/**
* @link https://github.com/yourickds/adminlte
* @copyright Copyright (c) 2018 Yourick
* @license http://opensource.org/licenses/MIT MIT
*/

use yii\helpers\Html;
use yii\grid\GridView;
use yourickds\adminlte\assets\FontAwesomeAsset;
use yourickds\adminlte\assets\IoniconsAsset;
use yourickds\adminlte\assets\BootstrapDataTablesAsset;
use yourickds\adminlte\assets\DataTablesAsset;
use yourickds\adminlte\assets\SlimscrollAsset;
use yourickds\adminlte\assets\FastClickAsset;
use yourickds\adminlte\assets\AdminlteAsset;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'AdminLTE 2 | Содержимое - Параметры';
$this->registerCsrfMetaTags();

FontAwesomeAsset::register($this);
IoniconsAsset::register($this);
BootstrapDataTablesAsset::register($this);
DataTablesAsset::register($this);
SlimscrollAsset::register($this);
FastClickAsset::register($this);
//Common Assets * Можно вынести в layouts но нужно будет все изображения перенести в папку @web *
$bundle = AdminlteAsset::register($this);
$this->params['bundle'] = $bundle;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Параметры
            <small>просмотр</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= \yii\helpers\Url::to(['/adminlte/dashboard']) ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Содержимое</li>
            <li class="active">Параметры</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?= Html::a('Добавить параметр', ['create'], ['class' => 'btn-sm btn-success']) ?>
                    </div>
                    <div class="box-body">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [

                            'id',
                            [
                                'attribute' => 'page_id',
                                'value' => function($data){
                                    return $data->page->name;
                                }
                            ],
                            [
                                'attribute' => 'action',
                                'value' => function($data){
                                    return $data->page->action;
                                }
                            ],
                            'name',
                            'description',

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update} {delete}'
                            ],
                        ],
                    ]); ?>

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