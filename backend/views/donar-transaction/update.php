<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DonarTransaction */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Donar Transaction',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donar Transactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="donar-transaction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
