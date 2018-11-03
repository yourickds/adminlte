<?php
/**
* @link https://github.com/yourickds/adminlte
* @copyright Copyright (c) 2018 Yourick
* @license http://opensource.org/licenses/MIT MIT
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yourickds\adminlte\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- general form elements -->
<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

        <!-- Параметры -->

        <?php if (isset($params)): ?>
            <?php foreach ($params as $param): ?>
                <div class="form-group field-page_params-<?= $param['name'] ?>">
                    <label class="control-label" for="page_params-<?= $param['name'] ?>"><?= $param['description'] ?></label>
                    <?= Html::textInput("PageParams[{$param['name']}]",$param['value'],
                        ['id' => "page_params-{$param['name']}", 'maxlength' => 255, 'class' => 'form-control']) ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<!-- /.box -->