<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">


    <p>
    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->orderID], [
            'class' => 'btn btn-outline-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
          <?= Html::a(' <i class="ft-x"></i> Back', ['index'], ['class' => 'btn btn-outline-dark']);?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'orderID',
            'clientID',
            'MSISDN',
            'contentID',
            'messageID',
            'payerNarration',
            'name',
            'checkoutRequestID',
            'recieptNumber',
            'active',
            'dateCreated',
            'dateModified',
            'insertedBy',
            'updatedBy',
        ],
    ]) ?>

</div>
