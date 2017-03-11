<?php

/* @var $this yii\web\View */

$this->title = 'Msaada';
use yii\bootstrap\Html;
?>
<div class="site-index" align="center">

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6" style="border-bottom: orange 2px solid;margin-left: 100px">
            <div class="row">
                <div class="col-md-12 text-center" style="background: orange;margin-left: 0px;color: white"><h3>Total Members</h3></div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center"><h3 style="color: orange"><i class="fa fa-users"></i> 455</h3></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6" style="border-bottom: cornflowerblue 2px solid;margin-left: 5px">
            <div class="row">
                <div class="col-md-12 text-center" style="background: cornflowerblue;margin-left: 0px;color: white"><h3>Total Donars</h3></div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center"><h3 style="color: cornflowerblue"><i class="fa fa-users"></i> 455</h3></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6" style="border-bottom: seagreen 2px solid;margin-left: 5px">
            <div class="row">
                <div class="col-md-12 text-center" style="background: seagreen;margin-left: 0px;color: white"><h3>Total Volunteers</h3></div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center"><h3 style="color: seagreen"><i class="fa fa-unlock"></i> 455</h3></div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6" style="margin-left: 100px">
            <div class="row">
                <div class="col-md-12" style="background: white;color: skyblue;border-left: solid 2px skyblue"><h3> <?= Html::a(Yii::t('app', '<i class="fa fa-plus"></i> New Member'), ['project/create']) ?> </h3></div>
            </div>
        </div>

    </div>
</div>
