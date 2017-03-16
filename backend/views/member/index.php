<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Members');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'New Member'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'photo',
                'format' => 'html',
                'label' => 'Photo',
                'value' => function ($data) {
                    return Html::img('uploads/' . $data['photo'],
                        ['width' => '40px','height'=>'40px','class'=>'img-circle']);
                },
            ],
            'member_number',
            'first_name',
            'middle_name',
            'surname',
            [
                    'attribute'=>'district_id',
                    'value'=>'district.name',
            ],
           'phone_number',
           'date_of_birth',
           'place_of_birth',
            'current_address',
            // 'photo',
            // 'finger_print',
            // 'maker_id',
            // 'maker_time',

            ['class' => 'yii\grid\ActionColumn','header'=>'Actions'],
        ],
    ]); ?>
</div>
