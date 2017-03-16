<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\District;
use kartik\date\DatePicker;
use yii\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <?= Yii::t('app', 'Member Form'); ?>
        </div>
        <div class="panel-body">
        <div class="row">
            <div class="col-md-8"><?= $form->field($model, 'district_id')->dropDownList(District::getAll(),['prompt'=>Yii::t('app','--Select--')]) ?></div>
            <div class="col-md-4"><?= $form->field($model, 'member_number')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?></div>
        </div>



    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gender')->dropDownList(['M'=>'Male','F'=>'Female'],['prompt'=>Yii::t('app','--Select--')]) ?>
    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_birth')->widget(DatePicker::ClassName(),
                [
                    'name' => 'date_of_birth',
                    // 'value' => date('d-M-Y', strtotime('+2 days')),
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-m-dd',
                        'todayHighlight' => true
                    ]
                ]);?>

    <?= $form->field($model, 'place_of_birth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_photo')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'finger_print')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>
