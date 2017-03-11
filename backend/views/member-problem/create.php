<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MemberProblem */

$this->title = Yii::t('app', 'Create Member Problem');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member Problems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-problem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
