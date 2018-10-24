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
use yourickds\adminlte\assets\ICheckAsset;

FontAwesomeAsset::register($this);
IoniconsAsset::register($this);
FastClickAsset::register($this);
//Common Assets * Можно вынести в layouts но нужно будет все изображения перенести в папку @web *
$bundle = AdminlteAsset::register($this);
$this->params['bundle'] = $bundle;
ICheckAsset::register($this);

$script = <<<JS
$(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
JS;
$this->registerJs($script);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Log in</title>
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
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= \yii\helpers\Url::to(['/adminlte/dashboard']) ?>"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php $form = \yii\widgets\ActiveForm::begin([
                'fieldConfig' => [
                    'options' => [
                        'class' => 'form-group has-feedback',
                    ],
                ],
            ]) ?>
                <?= $form->field($model, 'email', [
                    'template' => "{input}\n" .
                        \yii\helpers\Html::tag('span', null, [
                            'class' => 'glyphicon glyphicon-envelope form-control-feedback'
                        ]) . "\n{hint}\n{error}",
                ])->textInput(['type' => 'email', 'placeholder' => 'Email']) ?>
                <?= $form->field($model, 'password', [
                    'template' => "{input}\n" .
                        \yii\helpers\Html::tag('span', null, [
                            'class' => 'glyphicon glyphicon-lock form-control-feedback'
                        ]) . "\n{hint}\n{error}",
                ])->passwordInput(['placeholder' => 'Password']) ?>
                <div class="row">
                    <div class="col-xs-8">
                        <?= $form->field($model, 'rememberMe', ['options' => ['class' => 'checkbox icheck']])->checkbox() ?>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            <?php \yii\widgets\ActiveForm::end() ?>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                    Google+</a>
            </div>
            <!-- /.social-auth-links -->

            <a href="#">I forgot my password</a><br>
            <a href="<?= \yii\helpers\Url::to(['register']) ?>" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>