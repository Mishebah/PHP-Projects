<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;

	
	
?>

                        <!-- title-->
                        <h4 class="mt-0">Reset Password</h4>
                        <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>

                        <!-- form -->
                         <?php $form = ActiveForm::begin(['id' => 'reset-form','enableAjaxValidation' => true,'enableClientValidation' => true]); ?>	
						 <?php echo $form->errorSummary($model, array('errorCssClass' => 'alert alert-error')); ?>
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
								<?= $form->field($model, 'emailAddress',[])->textInput(['autofocus' => true,'title'=>'email address',  'placeholder'=>'Email Address', 'class' => 'form-control'])->label(false) ?>
                                                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-lock-reset"></i> Reset Password </button>
                            </div>                            
                         <?php ActiveForm::end(); ?>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Back to <?=Html::a('<b>Log In</b>',['login'],['class' => 'text-muted ml-1']) ?> </p>
                        </footer>
						
						
 