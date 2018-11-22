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
/* @var $model yourickds\adminlte\models\Param */

$this->title = 'AdminLTE 2 | Каталог - Параметры - ' . $model->name;

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
            <?= $model->name ?>
            <small>просмотр</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= \yii\helpers\Url::to(['/adminlte/dashboard']) ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Каталог</li>
            <li><a href="<?= \yii\helpers\Url::to(['index']) ?>">Параметры</a></li>
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
                                [
                                    'attribute' => 'category_id',
                                    'value' => $model->category->name
                                ],
                                [
                                    'attribute' => 'group_id',
                                    'value' => $model->group->name
                                ],
                                'name',
                                'shortName',
                                'description',
                                'sort',
                                'xml:boolean',
                                'filter:boolean',
                                'type_filter'
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
</div>
<!-- /.content-wrapper -->