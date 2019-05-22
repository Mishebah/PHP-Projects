<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleActionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="module-actions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'moduleActionID') ?>

    <?= $form->field($model, 'moduleID') ?>

    <?= $form->field($model, 'entityActionID') ?>

    <?= $form->field($model, 'action') ?>

    <?= $form->field($model, 'active') ?>

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
