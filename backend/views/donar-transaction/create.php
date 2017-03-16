<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DonarTransaction */

$this->title = Yii::t('app', 'Create Donar Transaction');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donar Transactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donar-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
