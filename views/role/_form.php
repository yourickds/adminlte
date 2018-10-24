<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yourickds\adminlte\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- general form elements -->
<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'disabled' => $model->getScenario() == "create" ? false : true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'disabled' => $model->getScenario() == "create" ? false : true]) ?>

    <?= $form->field($model, 'permissions')->dropDownList($permissions, [
        'class' => 'form-control select2',
        'multiple' => 'multiple',
        'data-placeholder' => 'Выберите разрешения',
    ]) ?>
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<!-- /.box -->
<?php
$script = <<<JS
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
        // theme: "classic"
    })
  })
JS;
$this->registerJs($script);
?>