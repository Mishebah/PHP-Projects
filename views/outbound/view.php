<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Outbound */

$this->title = $model->outboundID;
$this->params['breadcrumbs'][] = ['label' => 'Outbounds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outbound-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->outboundID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->outboundID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'outboundID',
            'transactionID',
            'messageID',
            'gatewayUUID',
            'sourceAddress',
            'MSISDN',
            'lastSend',
            'firstSend',
            'priority',
            'nextSend',
            'expiryDate',
            'numberOfSends',
            'delivered',
            'statusCode',
            'deliveryTime',
            'resend',
            'resendFrequency',
            'maxSends',
            'dateCreated',
            'updatedBy',
            'dateModified',
        ],
    ]) ?>

</div>
