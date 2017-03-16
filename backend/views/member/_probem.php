<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MemberProblem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-problem-form" style="background: #fff">
<?php if ($problemModel->isNewRecord)
{?>
    <?php $form = ActiveForm::begin(['action'=>['member-problem/create'], 'method' => 'post']); ?>
    <?php } else{?>
    <?php $form = ActiveForm::begin(['action'=>['member-problem/update','id' => $problemModel->id], 'method' => 'post']); ?>
<?php }?>
    <div class="panel panel-info">
        <div class="panel-body">
            <?= $form->field($problemModel, 'member_id')->hiddenInput(['maxlength' => true,'value'=>$model->id,'readonly'=>'readonly'])->label(false) ?>
    <?= $form->field($problemModel, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($problemModel, 'description')->textarea(['maxlength' => true]) ?>

    <?= $form->field($problemModel, 'start_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($problemModel, 'amount_required')->textInput(['maxlength' => true]) ?>

    <?= $form->field($problemModel, 'total_donated_amount')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>

    <?= $form->field($problemModel, 'status')->dropDownList(['0'=>'Pending','1'=>'Closed'],['prompt'=>Yii::t('app','--Select--')]) ?>

    <div class="form-group">
        <?= Html::submitButton($problemModel->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $problemModel->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
