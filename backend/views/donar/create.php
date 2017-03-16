<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Donar */

$this->title = Yii::t('app', 'Create Donar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
