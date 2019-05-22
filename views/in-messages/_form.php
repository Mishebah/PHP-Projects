<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InMessages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="in-messages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'messageContent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'msgLength')->textInput() ?>

    <?= $form->field($model, 'MSISDN')->textInput() ?>

    <?= $form->field($model, 'msgPages')->textInput() ?>

    <?= $form->field($model, 'messageStatusID')->textInput() ?>

    <?= $form->field($model, 'dateCreated')->textInput() ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'dateModified')->textInput() ?>

    <?= $form->field($model, 'updatedBy')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
