<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'clientID') ?>

    <?= $form->field($model, 'uuid') ?>

    <?= $form->field($model, 'clientName') ?>

    <?= $form->field($model, 'clientDesc') ?>

    <?= $form->field($model, 'telephoneNo') ?> 
     <?= $form->field($model, 'active') ?>
    <?php // echo $form->field($model, 'postalAddress') ?>

    <?php // echo $form->field($model, 'physicalAddress') ?>

    <?php // echo $form->field($model, 'emailAddress') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'activityHistory') ?>

    <?php // echo $form->field($model, 'insertedBy') ?>

    <?php // echo $form->field($model, 'dateCreated') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'dateModified') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
