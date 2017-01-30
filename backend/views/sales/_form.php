<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use backend\models\Product;

use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-form">
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="fa fa-bars bg-success"></i> Sales Form</h4></div>
        <div class="panel-body">

    <div class="row">
        <div class="col-md-9">
            <?php

            $data = Product::find()
                ->select(['product_name as value', 'product_name as  label','id as id'])
                ->asArray()
                ->all();

            //echo 'Product Name' .'<br>';
            echo AutoComplete::widget([
                    'options'=>[
                        'placeholder'=>'Enter product name or barcode',
                        'style'=>'width:900px;padding:8px'
                    ],
                'clientOptions' => [
                    'source' => $data,
                    'minLength'=>'3',
                    'autoFill'=>true,
                    'select' => new JsExpression("function( event, ui ) {
                    
                    $('#memberssearch-family_name_id').val(ui.item.id);
                    var id=ui.item.id;
                    //alert(ui.item.id);
                    $('#prod-id').html(id);
     
                 }")],
            ]);
            ?><span style="padding: 10px"><?= Html::button(Yii::t('app', '<i class="fa fa-search"></i>'), ['class' => 'btn btn-warning','id'=>'product_id']) ?></span>
            <?= Html::activeHiddenInput($model, 'product_name')?>
            <div id="prod-id" style="visibility:hidden">test</div>
            <div>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                   // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class'=>'kartik\grid\SerialColumn'],

                        [
                                'attribute'=>'product_id',
                                'value'=>'product.product_name',
                        ],
                        [
                            'class'=>'kartik\grid\EditableColumn',
                            'attribute'=>'price',

                            'editableOptions'=> [

                                'formOptions' => ['action' => ['cart/editcart']],
                                'asPopover' => false,
                                //'inputType'=>\kartik\editable\Editable::INPUT_SPIN,
                                'options'=>[
                                    'pluginOptions'=>['min'=>0, 'max'=>5000]
                                ]
                            ],

                        ],
                        'qty',
                        'total',


                        ['class' => 'yii\grid\ActionColumn','header'=>'Actions'],
                    ],
                ]); ?>
            </div>
        </div>
        <div class="col-md-3">
            <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'trn_dt')->textInput() ?>

    <?= $form->field($model, 'total_qty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Complete Sale') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>


        </div>
    </div>

</div>
