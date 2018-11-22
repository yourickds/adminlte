<?php
/**
* @link https://github.com/yourickds/adminlte
* @copyright Copyright (c) 2018 Yourick
* @license http://opensource.org/licenses/MIT MIT
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yourickds\adminlte\models\Param */
/* @var $form yii\widgets\ActiveForm */

$_csrf = Yii::$app->request->getCsrfToken();
$script = <<<JS
    $(function(){
        $(document).ready(function(){
            $.ajax({
                method: "POST",
                url: "get-groups?category_id="+$('#param-category_id').val(),
                dataType: "json",
                data: {'_csrf': "$_csrf"},
                success: function(response) {
                    for (key in response) {
                        $('#param-group_id').append('<option value="'+key+'">'+response[key].name+'</option>');
                    }
                }
            });
        });
        
        $('#param-category_id').on('change', function(){
            $.ajax({
                method: "POST",
                url: "get-groups?category_id="+$('#param-category_id').val(),
                dataType: "json",
                data: {'_csrf': "$_csrf"},
                success: function(response) {
                    $('#param-group_id').empty();
                    for (key in response) {
                        $('#param-group_id').append('<option value="'+key+'">'+response[key].name+'</option>');
                    }
                }
            });
        });
    })
JS;
$this->registerJs($script);
?>

<!-- general form elements -->
<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">

        <?= $form->field($model, 'category_id')->dropDownList(\yourickds\adminlte\models\Category::find()
            ->select(['name', 'id'])->indexBy('id')->asArray()->column()) ?>

        <?= $form->field($model, 'group_id')->dropDownList([]) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'shortName')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sort')->textInput(['type' => 'number', 'min' => 0, 'value' => 0]) ?>

        <?= $form->field($model, 'type_filter')->dropDownList(['Чекбокс' => 'Чекбокс', 'Диапазон' => 'Диапазон']) ?>

        <?= $form->field($model, 'xml', ['options' => ['class' => 'form-group checkbox']])->checkbox() ?>

        <?= $form->field($model, 'filter', ['options' => ['class' => 'form-group checkbox']])->checkbox() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<!-- /.box -->