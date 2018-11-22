<?php
/**
* @link https://github.com/yourickds/adminlte
* @copyright Copyright (c) 2018 Yourick
* @license http://opensource.org/licenses/MIT MIT
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yourickds\adminlte\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- general form elements -->
<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">

        <?= $form->field($model, 'parent')->dropDownList($parents) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sort')->textInput(['type' => 'number', 'min' => 0, 'value' => 0]) ?>

        <?= $form->field($model, 'status')->dropDownList([0 => 'Не публиковать', 1 => 'Опубликовать']) ?>

        <?= $form->field($model, 'metaTitle')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'metaDescription')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'imageFile')->fileInput(['accept' => 'image/*']) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<!-- /.box -->