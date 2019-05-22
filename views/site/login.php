<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use common\widgets\Alert;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>            
          <!-- title-->
                        <h4 class="mt-0">Sign In</h4>
                        <p class="text-muted mb-4">Enter username and password to access account.</p>
				<?= Alert::widget() ?>
                        <!-- form -->
						 <?php $form = ActiveForm::begin(['id' => 'login-form','enableAjaxValidation' => false,'enableClientValidation' => true,
						 ]); ?>	
						 
                            <div class="form-group">
                                <label for="emailaddress">UserName</label>
							<?= $form->field($model, 'username',[ ])->textInput(['autofocus' => true,'title'=>'Please enter your email address',  'placeholder'=>'Username', 'class' => 'form-control'])->label(false) ?>

                            </div>
                            <div class="form-group">
                               				<?=Html::a('Forgot your password?',
    ['site/passwordreset'],['class' => 'text-muted float-right']) ?>
	
                                <label for="password">Password</label>
						<?= $form->field($model, 'password',[])->passwordInput(['title'=>'Please enter you password', 'placeholder'=>'Password', 'class' => 'form-control'])->label(false)  ?>

                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> LOGIN </button>
                            </div>
                            <!-- social-->
							<!--
                            <div class="text-center mt-4">
                                <p class="text-muted font-16">Sign in with</p>
                                <ul class="social-list list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                    </li>
                                </ul>
                            </div>  -->
							
                       <?php ActiveForm::end(); ?>
					    <footer class="footer footer-alt">
                            <p>Don't have an account? <?=Html::a('Sign Up',
    ['signup'],['class' => 'ml-1']) ?></p>
                        </footer>
                        <!-- end form-->
						
						
		
                     
				
				
				
				
