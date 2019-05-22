<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OutMessagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="out-messages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'messageID') ?>

    <?= $form->field($model, 'clientID') ?>

    <?= $form->field($model, 'ordersID') ?>

    <?= $form->field($model, 'paymentID') ?>

    <?= $form->field($model, 'contentName') ?>

    <?php // echo $form->field($model, 'downloadID') ?>

    <?php // echo $form->field($model, 'messageContent') ?>

    <?php // echo $form->field($model, 'MSISDN') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'dateCreated') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'dateModified') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
