<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Outbound */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outbound-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'transactionID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'messageID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gatewayUUID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sourceAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MSISDN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastSend')->textInput() ?>

    <?= $form->field($model, 'firstSend')->textInput() ?>

    <?= $form->field($model, 'priority')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nextSend')->textInput() ?>

    <?= $form->field($model, 'expiryDate')->textInput() ?>

    <?= $form->field($model, 'numberOfSends')->textInput() ?>

    <?= $form->field($model, 'delivered')->textInput() ?>

    <?= $form->field($model, 'statusCode')->textInput() ?>

    <?= $form->field($model, 'deliveryTime')->textInput() ?>

    <?= $form->field($model, 'resend')->textInput() ?>

    <?= $form->field($model, 'resendFrequency')->textInput() ?>

    <?= $form->field($model, 'maxSends')->textInput() ?>

    <?= $form->field($model, 'dateCreated')->textInput() ?>

    <?= $form->field($model, 'updatedBy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateModified')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
