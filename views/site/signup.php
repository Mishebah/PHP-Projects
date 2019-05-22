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
                        <h4 class="mt-0">Free Sign Up</h4>
                        <p class="text-muted mb-1">Don't have an account? Create your account, it takes less than a minute</p>

                        <!-- form -->
                       <?= Alert::widget() ?>
						 <?php $form = ActiveForm::begin(['id' => 'register-form',
				 'action' => 'signup',	'enableAjaxValidation' => false,'enableClientValidation' => true,                                            
                                                 ]); ?>
												 	<?php echo $form->errorSummary($model, array('errorCssClass' => 'alert alert-error')); ?>
													
                            <div class="form-group">
                                <label for="fullname">Name</label>
								<?= $form->field($model, 'clientName')->textInput(['autofocus' => true,'title'=>'Please enter you name', 'autocomplete'=>'off', 'placeholder'=>'Name', 'class' => 'form-control'])->label(false) ?>
                            </div>
                            <div class="form-group">
                      <label for="emailaddress">Email address</label>
						<?= $form->field($model, 'emailAddress')->input('email',['placeholder'=>'Email address', 'autocomplete'=>'off', 'class' => 'form-control'])->label(false)  ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
				  <?= $form->field($model, 'password')->passwordInput(['title'=>'Please enter you password', 'placeholder'=>'Password','autocomplete'=>'off', 'class' => 'form-control'])->label(false)  ?>
                            </div>
							                            <div class="form-group">
                                <label for="repeatpassword">Repeat Password</label>
				  <?= $form->field($model, 'repeatpassword')->passwordInput(['title'=>'Please enter you password', 'placeholder'=>'Repeat Password','autocomplete'=>'off', 'class' => 'form-control'])->label(false)  ?>
                            </div>
							
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                    <label class="custom-control-label" for="checkbox-signup">I accept  <?=Html::a('Terms and Conditions',
    ['login'],['class' => 'text-muted ml-1']) ?> </label>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-account-circle"></i> Sign Up </button>
                            </div>
							
                            <!-- social
                            <div class="text-center mt-4">
                                <p class="text-muted font-16">Sign up using</p>
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
                            </div> -->
                         <?php ActiveForm::end(); ?>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Already have account? <?=Html::a('Log Up',
    ['login'],['class' => 'text-muted ml-1']) ?></p>
                        </footer>
						
						

				