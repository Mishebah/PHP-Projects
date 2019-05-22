<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

  <!-- title-->
                        <h4 class="mt-0">SET Password</h4>
                        <p class="text-muted mb-4">Enter password.</p>
				<?= Alert::widget() ?>
                        <!-- form -->
						       <?php $form = ActiveForm::begin(['id' => 'reset-password-form','class' => 'form','enableAjaxValidation' => false,'enableClientValidation' => true,
						 ]); ?>	
						 
                            <div class="form-group">
                                <label for="emailaddress">Password</label>
							<?= $form->field($model, 'password',[])->passwordInput(['title'=>'Please enter you password', 'placeholder'=>'Password', 'class' => 'form-control'])->label(false)  ?>

                            </div>
                            <div class="form-group">
                               		                              <label for="password">Repeat Password</label>
								<?= $form->field($model, 'password_repeat',[])->passwordInput(['title'=>'Please enter you password', 'placeholder'=>'Password', 'class' => 'form-control'])->label(false)  ?>
                            </div>
                             <div class="form-group mb-0 text-center">
							                                 <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-lock-reset"></i> SET Password </button>                               
                            </div>                       
							
                       <?php ActiveForm::end(); ?>
					   
		
                     