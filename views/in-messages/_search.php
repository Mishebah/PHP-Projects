<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InMessagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="in-messages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'messageID') ?>

    <?= $form->field($model, 'messageContent') ?>

    <?= $form->field($model, 'msgLength') ?>

    <?= $form->field($model, 'MSISDN') ?>

    <?= $form->field($model, 'msgPages') ?>

    <?php // echo $form->field($model, 'messageStatusID') ?>

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
