<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Downloads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="downloads-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orderID')->textInput() ?>

    <?= $form->field($model, 'clientID')->textInput() ?>

    <?= $form->field($model, 'contentID')->textInput() ?>

    <?= $form->field($model, 'downloads')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updatedBy')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'dateCreated')->textInput() ?>

    <?= $form->field($model, 'dateModified')->textInput() ?>

    <?= $form->field($model, 'insertedBy')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
