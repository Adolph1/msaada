<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model backend\models\Member */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <div style="float: right;margin-top: 10px">
        <?= Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Disable'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div>

        <div class="row" style="background: #fff">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row" style="background: #fff;padding: 60px">
            <div class="col-md-2 text-center">
                <div ><?= \backend\models\Member::getImage($model->id);?></div>
            </div>
            <div class="col-md-2 text-left" style="border-right: solid thin #ccccff;border-left: solid thin #ccccff;">
                <div><b><?= $model->first_name;?> <?= $model->middle_name;?> <?= $model->surname;?></b></div>
                <div>Gender:
                    <?php
                    if($model->gender==\backend\models\Member::FEMALE) {
                        echo 'FEMALE';
                    }elseif($model->gender==\backend\models\Member::MALE){
                        echo 'MALE';
                    }
                    ?>
                </div>
                <div>Date registered: <?= $model->maker_time;?></div>
                <div>District registered: <?= \backend\models\District::getName($model->district_id);?></div>
                <div>Date of birth: <?= $model->date_of_birth;?></div>
                <div>Age: <?= \backend\models\Member::calAge(date('Y-m-d'),$model->date_of_birth);?></div>
            </div>

            <div class="col-md-2">
                <h2><i class="fa fa-book"></i> <?= $model->member_number?></h2>
                <small style="color: #bbb">MemberID</small>
            </div>
            <div class="col-md-2">

                    <h2><i class="fa fa-location-arrow"></i> <?= $model->place_of_birth?></h2>
                    <small style="color: #bbb">Birth place</small>

            </div>
            <div class="col-md-2">
                <h2><i class="fa fa-location-arrow"></i> <?= $model->current_address?></h2>
                <small style="color: #bbb">Current location</small>
            </div>
        </div>
        <div>
            <?php
            echo TabsX::widget([
                'position' => TabsX::POS_ABOVE,
                'align' => TabsX::ALIGN_LEFT,
                'items' => [
                    [
                        'label' => 'Problem Details',
                        'content' => $this->render('_probem',['problemModel'=>$problemModel,'model'=>$model]),
                        'active' => true,
                         'options' => ['style' => 'background:#fff'],
                    ],
                    [
                        'label' => 'Contributions',
                        'content' =>'',
                        'headerOptions' => ['style'=>'font-weight:bold'],
                        'options' => ['id' => 'myveryownID'],
                    ],
                    [
                        'label' => 'Comments',
                        'content' =>'',
                        'headerOptions' => ['style'=>'font-weight:bold'],
                        'options' => ['id' => 'myveryownID'],
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
</div>
