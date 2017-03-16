<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Region;

/* @var $this yii\web\View */
/* @var $model backend\models\District */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="district-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <?= Yii::t('app', 'District Form'); ?>
        </div>
        <div class="panel-body">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

   <div class="row">
       <div class="col-md-12"><?= $form->field($model, 'region_id')->dropDownList(Region::getAll(),['prompt'=>Yii::t('app','--Select--')]) ?></div>
        </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
