<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MemberProblemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Member Problems');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-problem-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Member Problem'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'member_id',
            'title',
            'description',
            'start_year',
            // 'amount_required',
            // 'total_donated_amount',
            // 'status',
            // 'maker_id',
            // 'maker_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
