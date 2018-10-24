<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

/* @var $this yii\web\View */
/* @var $model yourickds\adminlte\models\Role */

use yourickds\adminlte\assets\AdminlteAsset;
use yourickds\adminlte\assets\FontAwesomeAsset;
use yourickds\adminlte\assets\IoniconsAsset;
use yourickds\adminlte\assets\DataTablesAsset;
use yourickds\adminlte\assets\BootstrapDataTablesAsset;
use yourickds\adminlte\assets\SlimscrollAsset;
use yourickds\adminlte\assets\FastClickAsset;
use yii\helpers\Html;

$this->title = 'AdminLTE 2 | Настройки - Роли';
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
            Роли
            <small>просмотр</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= \yii\helpers\Url::to(['/adminlte/dashboard']) ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Настройки</li>
            <li class="active">Роли</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?= \yii\helpers\Html::a('Добавить роль', ['create'], ['class' => 'btn-sm btn-success']) ?>
                    </div>
                    <div class="box-body">
                        <?= \yii\grid\GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                [
                                    'attribute' => 'name',
                                    'label' => 'Название'
                                ],
                                [
                                    'attribute' => 'description',
                                    'label' => 'Описание'
                                ],

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'buttons' => [
                                        'view' => function($url, $model, $key){
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                                \yii\helpers\Url::to(['view', 'role' => $key]), [
                                                    'title' => 'Просмотр',
                                                    'aria-label' => 'Просмотр',
                                                    'data-pjax' => 0
                                                ]
                                            );
                                        },
                                        'update' => function($url, $model, $key){
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                                \yii\helpers\Url::to(['update', 'role' => $key]), [
                                                    'title' => 'Редактировать',
                                                    'aria-label' => 'Редактировать',
                                                    'data-pjax' => 0
                                                ]
                                            );
                                        },
                                        'delete' => function($url, $model, $key){
                                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                                \yii\helpers\Url::to(['delete', 'role' => $key]), [
                                                    'title' => 'Удалить',
                                                    'aria-label' => 'Удалить',
                                                    'data-pjax' => 0,
                                                    'data' => [
                                                        'confirm' => 'Вы уверены, что хотите удалить роль?',
                                                        'method' => 'post',
                                                    ],
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->