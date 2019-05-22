<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OutboundSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outbound-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'outboundID') ?>

    <?= $form->field($model, 'transactionID') ?>

    <?= $form->field($model, 'messageID') ?>

    <?= $form->field($model, 'gatewayUUID') ?>

    <?= $form->field($model, 'sourceAddress') ?>

    <?php // echo $form->field($model, 'MSISDN') ?>

    <?php // echo $form->field($model, 'lastSend') ?>

    <?php // echo $form->field($model, 'firstSend') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'nextSend') ?>

    <?php // echo $form->field($model, 'expiryDate') ?>

    <?php // echo $form->field($model, 'numberOfSends') ?>

    <?php // echo $form->field($model, 'delivered') ?>

    <?php // echo $form->field($model, 'statusCode') ?>

    <?php // echo $form->field($model, 'deliveryTime') ?>

    <?php // echo $form->field($model, 'resend') ?>

    <?php // echo $form->field($model, 'resendFrequency') ?>

    <?php // echo $form->field($model, 'maxSends') ?>

    <?php // echo $form->field($model, 'dateCreated') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'dateModified') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
