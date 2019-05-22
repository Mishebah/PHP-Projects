<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'contentID') ?>

    <?= $form->field($model, 'clientID') ?>

    <?= $form->field($model, 'ordersID') ?>

    <?= $form->field($model, 'messageID') ?>

    <?= $form->field($model, 'keyword') ?>

    <?php // echo $form->field($model, 'owner') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'originalFileName') ?>

    <?php // echo $form->field($model, 'generatedFileName') ?>

    <?php // echo $form->field($model, 'payerNarration') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'dateCreated') ?>

    <?php // echo $form->field($model, 'dateModified') ?>

    <?php // echo $form->field($model, 'insertedBy') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
