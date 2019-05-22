<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'userID') ?>

    <?= $form->field($model, 'clientID') ?>

    <?= $form->field($model, 'userName') ?>

    <?= $form->field($model, 'fullNames') ?>

    <?= $form->field($model, 'emailAddress') ?>

    <?php // echo $form->field($model, 'IDNumber') ?>

    <?php echo $form->field($model, 'MSISDN') ?>

    <?php // echo $form->field($model, 'canAccessUI') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'passwordAttempts') ?>

    <?php // echo $form->field($model, 'passwordStatusID') ?>

    <?php // echo $form->field($model, 'datePasswordChanged') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'dateActivated') ?>

    <?php // echo $form->field($model, 'dateCreated') ?>

    <?php // echo $form->field($model, 'dateModified') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
