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
    <!-- /.box-header -->
    <!-- form start -->
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">

        <?= $form->field($model, 'shopId')->textInput() ?>

        <?= $form->field($model, 'category_id')->dropDownList(\yourickds\adminlte\models\Category::find()
            ->select(['name', 'id'])->indexBy('id')->asArray()->column()) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'manufacturer_id')->dropDownList(\yourickds\adminlte\models\Manufacturer::find()
            ->select(['name', 'id'])->indexBy('id')->column()) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<!-- /.box -->