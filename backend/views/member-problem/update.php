<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MemberProblem */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Member Problem',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member Problems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="member-problem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
