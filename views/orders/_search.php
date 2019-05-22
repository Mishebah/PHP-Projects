<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'orderID') ?>

    <?= $form->field($model, 'clientID') ?>

    <?= $form->field($model, 'MSISDN') ?>

    <?= $form->field($model, 'contentID') ?>

    <?= $form->field($model, 'messageID') ?>

    <?php // echo $form->field($model, 'payerNarration') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'checkoutRequestID') ?>

    <?php // echo $form->field($model, 'recieptNumber') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'dateCreated') ?>

    <?php // echo $form->field($model, 'dateModified') ?>

    <?php // echo $form->field($model, 'insertedBy') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
