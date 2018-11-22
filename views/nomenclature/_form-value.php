<?php
/**
* @link https://github.com/yourickds/adminlte
* @copyright Copyright (c) 2018 Yourick
* @license http://opensource.org/licenses/MIT MIT
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yourickds\adminlte\models\Nomenclature */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- general form elements -->
<div class="box box-primary">
    <!-- form start -->
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">

        <?= $form->field($model, 'param_id', ['template' => '{input}'])->hiddenInput(['value' => $param_id]) ?>
        <?= $form->field($model, 'nomenclature_id', ['template' => '{input}'])->hiddenInput(['value' => $nomenclature_id]) ?>

        <?= $form->field($model, 'value')->textInput(['maxlength' => true])->hint('Несколько вариантов перечислять через знак ";"') ?>

    </div>
    <div class="modal-footer">
        <?= Html::button('Закрыть', ['class' => 'btn btn-default pull-left', 'data-dismiss' => 'modal']) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<!-- /.box -->