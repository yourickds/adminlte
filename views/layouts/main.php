<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

/* @var $this yii\web\View */
/* @var $content string */

$bundle = $this->params['bundle'];
$module = Yii::$app->controller->module;
$session = Yii::$app->session;

if ($module->toggleRightSidebarSlide)
    $this->registerJs("$('[data-toggle=\"control-sidebar\"]').controlSidebar();$('[data-toggle=\"control-sidebar\"]').data('lte.controlsidebar').options.slide = false");

if ($module->sidebarExpandHover)
    $this->registerJs("$('[data-toggle=\"push-menu\"]').pushMenu();$('[data-toggle=\"push-menu\"]').data('lte.pushmenu').expandOnHover();");

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php $this->head() ?>
</head>
<?php if ($module->toggleSidebar): ?>
<body class="hold-transition <?= $module->skin ?> sidebar-mini <?= $module->layoutBody ?> sidebar-collapse">
<?php else: ?>
<body class="hold-transition <?= $module->skin ?> sidebar-mini <?= $module->layoutBody ?>">
<?php endif; ?>
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?= \yii\helpers\Url::to(['/adminlte/dashboard']) ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <?= \yii\helpers\Html::img($bundle->baseUrl . '/img/user2-160x160.jpg', ['class' => 'img-circle']) ?>
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <?= \yii\helpers\Html::img($bundle->baseUrl . '/img/user3-128x128.jpg', ['class' => 'img-circle']) ?>
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <?= \yii\helpers\Html::img($bundle->baseUrl . '/img/user4-128x128.jpg', ['class' => 'img-circle']) ?>
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <?= \yii\helpers\Html::img($bundle->baseUrl . '/img/user3-128x128.jpg', ['class' => 'img-circle']) ?>
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <?= \yii\helpers\Html::img($bundle->baseUrl . '/img/user4-128x128.jpg', ['class' => 'img-circle']) ?>
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                            page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?= \yii\helpers\Html::img($bundle->baseUrl . '/img/user2-160x160.jpg', ['class' => 'user-image']) ?>
                            <span class="hidden-xs">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <?= \yii\helpers\Html::img($bundle->baseUrl . '/img/user2-160x160.jpg', ['class' => 'img-circle']) ?>
                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?= \yii\helpers\Url::to(['/adminlte/profile']) ?>" class="btn btn-default btn-flat">Профиль</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= \yii\helpers\Url::to(['auth/logout']) ?>" class="btn btn-default btn-flat">Выход</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php if ($notice = $session->getFlash('error')): ?>
            <div class="box-body col-md-6 col-md-offset-3">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Ошибка</h4>
                    <?= $notice ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($notice = $session->getFlash('notification')): ?>
        <div class="box-body col-md-6 col-md-offset-3">
            <div class="alert alert-<?= $notice['status'] ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Уведомление</h4>
                <?= $notice['value'] ?>
            </div>
        </div>
        <?php endif; ?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <?= \yii\helpers\Html::img($bundle->baseUrl . '/img/user2-160x160.jpg', ['class' => 'img-circle']) ?>
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?= \yii\widgets\Menu::widget([
                'options' => [
                    'class' => 'sidebar-menu tree',
                    'data-widget' => 'tree'
                ],
                'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
                'items' => [
                    ['label' => 'MAIN NAVIGATION', 'options' => ['class' => 'header']],
                    [
                        'url' => \yii\helpers\Url::to(['/adminlte/dashboard']),
                        'template' => '<a href="{url}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>',
                        'active' => Yii::$app->controller->route == 'adminlte/dashboard/index' ? true : false,
                    ],
                    [
                        'template' => '<a href="#"><i class="fa fa-plus-square"></i> <span>Содержимое</span>'.
                            '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                        'options' => ['class' => 'treeview'],
                        'active' => in_array(Yii::$app->controller->id, [
                            'page',
                            'page-params'
                        ]) ? true : false,
                        'items' => [
                            [
                                'url' => \yii\helpers\Url::to(['/adminlte/page']),
                                'template' => '<a href="{url}"><i class="fa fa-file"></i> <span>Страницы</span></a>',
                                'active' => Yii::$app->controller->id == 'page' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['/adminlte/page-params']),
                                'template' => '<a href="{url}"><i class="fa fa-cog"></i> <span>Параметры страниц</span></a>',
                                'active' => Yii::$app->controller->id == 'page-params' ? true : false,
                            ],
                        ],
                    ],
                    [
                        'template' => '<a href="#"><i class="fa fa-cubes"></i> <span>Каталог</span>'.
                            '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                        'options' => ['class' => 'treeview'],
                        'active' => in_array(Yii::$app->controller->id, [
                            'category',
                            'group',
                            'param',
                            'manufacturer',
                            'nomenclature',
                            'filter'
                        ]) ? true : false,
                        'items' => [
                            [
                                'url' => \yii\helpers\Url::to(['/adminlte/category']),
                                'template' => '<a href="{url}"><i class="fa fa-list-alt"></i> Категории</a>',
                                'active' => Yii::$app->controller->id == 'category' ? true : false
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['/adminlte/group']),
                                'template' => '<a href="{url}"><i class="fa fa-object-group"></i> Группы</a>',
                                'active' => Yii::$app->controller->id == 'group' ? true : false
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['/adminlte/param']),
                                'template' => '<a href="{url}"><i class="fa fa-cog"></i> Параметры</a>',
                                'active' => Yii::$app->controller->id == 'param' ? true : false
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['/adminlte/manufacturer']),
                                'template' => '<a href="{url}"><i class="fa fa-industry"></i> Производители</a>',
                                'active' => Yii::$app->controller->id == 'manufacturer' ? true : false
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['/adminlte/nomenclature']),
                                'template' => '<a href="{url}"><i class="fa fa-edit"></i> Номенклатура</a>',
                                'active' => Yii::$app->controller->id == 'nomenclature' ? true : false
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['/adminlte/filter']),
                                'template' => '<a href="{url}"><i class="fa fa-filter"></i> Фильтры</a>',
                                'active' => Yii::$app->controller->id == 'filter' ? true : false
                            ],
                        ],
                    ],
                    [
                        'url' => \yii\helpers\Url::to(['widgets/index']),
                        'template' => '<a href="{url}"><i class="fa fa-th"></i> <span>Widgets</span>'.
                            '<span class="pull-right-container">'.
                            '<small class="label pull-right bg-green">new</small></span></a>',
                        'active' => Yii::$app->controller->route == 'adminlte/widgets/index' ? true : false,
                    ],
                    [
                        'template' => '<a href="#"><i class="fa fa-pie-chart"></i> <span>Charts</span>'.
                            '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                        'options' => ['class' => 'treeview'],
                        'active' => Yii::$app->controller->id == 'charts' ? true : false,
                        'items' => [
                            [
                                'url' => \yii\helpers\Url::to(['charts/index']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> ChartJS</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/charts/index' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['charts/morris']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Morris</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/charts/morris' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['charts/flot']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Flot</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/charts/flot' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['charts/inline-charts']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Inline charts</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/charts/inline-charts' ? true : false,
                            ],
                        ],
                    ],
                    [
                        'template' => '<a href="#"><i class="fa fa-laptop"></i> <span>UI Elements</span>'.
                            '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                        'options' => ['class' => 'treeview'],
                        'active' => Yii::$app->controller->id == 'ui-elements' ? true : false,
                        'items' => [
                            [
                                'url' => \yii\helpers\Url::to(['ui-elements/index']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> General</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/ui-elements/index' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['ui-elements/icons']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Icons</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/ui-elements/icons' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['ui-elements/buttons']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Buttons</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/ui-elements/buttons' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['ui-elements/sliders']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Sliders</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/ui-elements/sliders' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['ui-elements/timeline']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Timeline</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/ui-elements/timeline' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['ui-elements/modals']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Modals</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/ui-elements/modals' ? true : false,
                            ],
                        ],
                    ],
                    [
                        'template' => '<a href="#"><i class="fa fa-edit"></i> <span>Forms</span>'.
                            '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                        'options' => ['class' => 'treeview'],
                        'active' => Yii::$app->controller->id == 'forms' ? true : false,
                        'items' => [
                            [
                                'url' => \yii\helpers\Url::to(['forms/index']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> General Elements</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/forms/index' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['forms/advanced']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Advanced Elements</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/forms/advanced' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['forms/editors']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Editors</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/forms/editors' ? true : false,
                            ],
                        ],
                    ],
                    [
                        'template' => '<a href="#"><i class="fa fa-table"></i> <span>Tables</span>'.
                            '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                        'options' => ['class' => 'treeview'],
                        'active' => Yii::$app->controller->id == 'tables' ? true : false,
                        'items' => [
                            [
                                'url' => \yii\helpers\Url::to(['tables/index']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Simple tables</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/tables/index' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['tables/data']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Data tables</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/tables/data' ? true : false,
                            ],
                        ],
                    ],
                    [
                        'url' => \yii\helpers\Url::to(['calendar/index']),
                        'template' => '<a href="{url}"><i class="fa fa-calendar"></i> <span>Calendar</span>'.
                            '<span class="pull-right-container"><small class="label pull-right bg-red">3</small>'.
                            '<small class="label pull-right bg-blue">17</small></span></a>',
                        'active' => Yii::$app->controller->id == 'calendar' ? true : false,
                    ],
                    [
                        'url' => \yii\helpers\Url::to(['mailbox/index']),
                        'template' => '<a href="{url}"><i class="fa fa-envelope"></i> <span>Mailbox</span>'.
                            '<span class="pull-right-container"><small class="label pull-right bg-yellow">12</small>'.
                            '<small class="label pull-right bg-green">16</small>'.
                            '<small class="label pull-right bg-red">5</small></span></a>',
                        'active' => Yii::$app->controller->id == 'mailbox' ? true : false,
                    ],
                    [
                        'template' => '<a href="#"><i class="fa fa-folder"></i> <span>Examples</span>'.
                            '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                        'options' => ['class' => 'treeview'],
                        'active' => Yii::$app->controller->id == 'examples' ? true : false,
                        'items' => [
                            [
                                'url' => \yii\helpers\Url::to(['examples/index']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Invoice</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/examples/index' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['examples/lockscreen']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Lockscreen</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/examples/lockscreen' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['examples/blank']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Blank Page</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/examples/blank' ? true : false,
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['examples/pace']),
                                'template' => '<a href="{url}"><i class="fa fa-circle-o"></i> Pace Page</a>',
                                'active' => Yii::$app->controller->route == 'adminlte/examples/pace' ? true : false,
                            ],
                        ],
                    ],
                    [
                        'template' => '<a href="#"><i class="fa fa-cog"></i> <span>Настройки</span>'.
                            '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                        'options' => ['class' => 'treeview'],
                        'active' => in_array(Yii::$app->controller->id, ['user', 'role']) ? true : false,
                        'items' => [
                            [
                                'url' => \yii\helpers\Url::to(['/adminlte/user']),
                                'template' => '<a href="{url}"><i class="fa fa-users"></i> Пользователи</a>',
                                'active' => Yii::$app->controller->id == 'user' ? true : false
                            ],
                            [
                                'template' => '<a href="#"><i class="fa fa-circle-o"></i> <span>Level One</span>'.
                                    '<span class="pull-right-container">'.
                                    '<i class="fa fa-angle-left pull-right"></i></span></a>',
                                'options' => ['class' => 'treeview'],
                                'items' => [
                                    ['template' => '<a href="#"><i class="fa fa-circle-o"></i> Level Two</a>'],
                                    [
                                        'template' => '<a href="#"><i class="fa fa-circle-o"></i> <span>Level Two</span>'.
                                            '<span class="pull-right-container">'.
                                            '<i class="fa fa-angle-left pull-right"></i></span></a>',
                                        'options' => ['class' => 'treeview'],
                                        'items' => [
                                            ['template' =>
                                                '<a href="#"><i class="fa fa-circle-o"></i> Level Three</a>'],
                                            ['template' =>
                                                '<a href="#"><i class="fa fa-circle-o"></i> Level Three</a>'],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'url' => \yii\helpers\Url::to(['/adminlte/role']),
                                'template' => '<a href="{url}"><i class="fa fa-key"></i> Роли</a>',
                                'active' => Yii::$app->controller->id == 'role' ? true : false
                            ],
                        ],
                    ],
                    [
                        'url' => 'https://adminlte.io/docs',
                        'template' => '<a href="{url}" target="_blank">'.
                            '<i class="fa fa-book"></i> <span>Documentation</span></a>'
                    ],
                    ['label' => 'LABELS', 'options' => ['class' => 'header']],
                    ['template' => '<a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a>'],
                    ['template' => '<a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a>'],
                    ['template' => '<a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a>'],
                ]
            ]) ?>
        </section>
        <!-- /.sidebar -->
    </aside>
    <?= $content ?>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-<?= $module->toggleRightSidebarSkin ?>">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>