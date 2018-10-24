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
use yourickds\adminlte\assets\FastClickAsset;
use yourickds\adminlte\assets\Select2Asset;

$this->title = 'AdminLTE 2 | Настройки - Роли - ' . $model->description . ' - Редактирование';

FontAwesomeAsset::register($this);
IoniconsAsset::register($this);
FastClickAsset::register($this);
Select2Asset::register($this);
//Common Assets * Можно вынести в layouts но нужно будет все изображения перенести в папку @web *
$bundle = AdminlteAsset::register($this);
$this->params['bundle'] = $bundle;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $model->description ?>
            <small>редактирование</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= \yii\helpers\Url::to(['/adminlte/dashboard']) ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Настройки</li>
            <li><a href="<?= \yii\helpers\Url::to(['index']) ?>">Роли</a></li>
            <li><a href="<?= \yii\helpers\Url::to(['view', 'role' => $model->name]) ?>"><?= $model->description ?></a></li>
            <li class="active">Редактирование</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?= $this->render('_form', [
                    'model' => $model,
                    'permissions' => $permissions
                ]) ?>
            </div>
            <!--/.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
