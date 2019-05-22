<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Outbound */

$this->title = 'Update Outbound: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Outbounds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->outboundID, 'url' => ['view', 'id' => $model->outboundID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="outbound-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
