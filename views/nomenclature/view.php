<?php
/**
* @link https://github.com/yourickds/adminlte
* @copyright Copyright (c) 2018 Yourick
* @license http://opensource.org/licenses/MIT MIT
*/

use yii\helpers\Html;
use yii\widgets\DetailView;
use yourickds\adminlte\assets\FontAwesomeAsset;
use yourickds\adminlte\assets\IoniconsAsset;
use yourickds\adminlte\assets\BootstrapDataTablesAsset;
use yourickds\adminlte\assets\DataTablesAsset;
use yourickds\adminlte\assets\SlimscrollAsset;
use yourickds\adminlte\assets\FastClickAsset;
use yourickds\adminlte\assets\AdminlteAsset;

/* @var $this yii\web\View */
/* @var $model yourickds\adminlte\models\Nomenclature */

$this->title = 'AdminLTE 2 | Каталог - Номенклатура - ' . $model->name;

FontAwesomeAsset::register($this);
IoniconsAsset::register($this);
BootstrapDataTablesAsset::register($this);
DataTablesAsset::register($this);
SlimscrollAsset::register($this);
FastClickAsset::register($this);
//Common Assets * Можно вынести в layouts но нужно будет все изображения перенести в папку @web *
$bundle = AdminlteAsset::register($this);
$this->params['bundle'] = $bundle;

$script = <<<JS
$('#modal-param').on('show.bs.modal', function (e) {
    let param_id = $(e.relatedTarget).data('id');
    let nomenclature_id = $(e.relatedTarget).data('nomenclature_id');
    $('#modal-param').find('.modal-dialog').load("update-value?id="+param_id+"&nomenclature_id="+nomenclature_id);
});
JS;
$this->registerJs($script);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $model->name ?>
            <small>просмотр</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= \yii\helpers\Url::to(['/adminlte/dashboard']) ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Каталог</li>
            <li><a href="<?= \yii\helpers\Url::to(['index']) ?>">Номенклатура</a></li>
            <li class="active"><?= $model->name ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn-sm btn-primary']) ?>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id',
                                'shopId',
                                [
                                    'attribute' => 'category_id',
                                    'value' => $model->category->name
                                ],
                                'name',
                                [
                                    'attribute' => 'manufacturer_id',
                                    'value' => $model->manufacturer->name
                                ],
                            ],
                        ]) ?>
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

    <!-- Param content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Параметры</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?= \yii\grid\GridView::widget([
                            'dataProvider' => $params,
                            'columns' => [
                                [
                                    'attribute' => 'name',
                                    'label' => 'Название'
                                ],
                                [
                                    'attribute' => 'value',
                                    'label' => 'Значение'
                                ],
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{update}',
                                    'buttons' => [
                                        'update' => function($url, $model, $key){
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                                '#',
                                                [
                                                    'data-id' => $key,
                                                    'data-nomenclature_id' => Yii::$app->request->get('id'),
                                                    'title' => 'Редактировать',
                                                    'aria-label' => 'Редактировать',
                                                    'data-pjax' => 0,
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#modal-param'
                                                ]
                                            );
                                        }
                                    ],
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
        <div class="modal fade" id="modal-param">
            <div class="modal-dialog">

            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->