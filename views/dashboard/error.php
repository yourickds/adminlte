<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yourickds\adminlte\assets\AdminlteAsset;
use yourickds\adminlte\assets\FontAwesomeAsset;
use yourickds\adminlte\assets\IoniconsAsset;
use yourickds\adminlte\assets\FastClickAsset;
use yii\helpers\Html;

$this->title = 'AdminLTE 2 | '.$name;

FontAwesomeAsset::register($this);
IoniconsAsset::register($this);
FastClickAsset::register($this);
//Common Assets * Можно вынести в layouts но нужно будет все изображения перенести в папку @web *
$bundle = AdminlteAsset::register($this);
$this->params['bundle'] = $bundle;
$this->title = $name;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= Html::encode($this->title) ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">404 error</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-<?= $exception->statusCode == 500 ? "red" : "yellow" ?>"> <?= $exception->statusCode ?></h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-<?= $exception->statusCode == 500 ? "red" : "yellow" ?>"></i> Oops! <?= nl2br(Html::encode($message)) ?></h3>

                <p>
                    <?php if($exception->statusCode == 404): ?>
                    We could not find the page you were looking for.
                    <?php elseif ($exception->statusCode == 500): ?>
                    We will work on fixing that right away.
                    <?php endif; ?>
                    Meanwhile, you may <a href="<?= \yii\helpers\Url::to(['default/index']) ?>">return to dashboard</a> or try using the search form.
                </p>

                <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-<?= $exception->statusCode == 500 ? "danger" : "warning" ?> btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.input-group -->
                </form>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
