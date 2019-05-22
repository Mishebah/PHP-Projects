<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;
/* @var $this yii\web\View */

$this->title = 'Home';
?>

        <!-- HOME -->
        <section class="home home-introform" id ="started">
            <div class="container">
                <div class="row vertical-content">
                    <div class="col-sm-6">
                        <div class="home-wrapper">
                            <h1 data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">Reliable Bulk SMS Service Provider in Kenya</h1>
                            <h4 data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">Reach more customers with faster, more Reliable Messaging <br> <b>Notify customers</b>
Integrate our SMS API to send time-critical reminders and notifications <br><b>Group SMS </b>Send a single SMS sent to many recipients who all receive the same message. <br><b>Personalized Bulk SMS</b>Send Unique Bulk SMS messages to many recipients </h4>
                            <a href="#services" class="btn btn-custom" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">Learn more</a>
                      
                        </div>
                    </div>

                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="home-wrapper">
						<?php $form = ActiveForm::begin(['id' => 'register-form',  'options' => ['class' => 'intro-form'],
				 'action' => 'register',	'enableAjaxValidation' => false,'enableClientValidation' => true]); ?>
                            <form role="form" class="intro-form">
                                <h3 class="text-center"> Get Started.  </h3>
                                <div class="form-group">
															<?= $form->field($model, 'clientName')->textInput(['autofocus' => true,'title'=>'Please enter you organization name', 'autocomplete'=>'off', 'placeholder'=>'Organization name', 'class' => 'form-control'])->label(false) ?>
                                </div>
                                <div class="form-group">
							<?= $form->field($model, 'userName')->textInput(['autofocus' => true,'title'=>'Please enter you user name', 'autocomplete'=>'off', 'placeholder'=>'user name', 'class' => 'form-control'])->label(false) ?>
                                </div>
                                <div class="form-group">
                                  <?= $form->field($model, 'emailAddress')->input('email',['placeholder'=>'Email address', 'autocomplete'=>'off', 'class' => 'form-control'])->label(false)  ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model, 'password')->passwordInput(['title'=>'Please enter you password', 'placeholder'=>'Password','autocomplete'=>'off', 'class' => 'form-control'])->label(false)  ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model, 'repeatpassword')->passwordInput(['title'=>'Please enter you password', 'placeholder'=>'Password','autocomplete'=>'off', 'class' => 'form-control'])->label(false)  ?>
                                </div>
                                <div class="form-group">
							<?= $form->field($model, 'MSISDN')->textInput(['autofocus' => true,'title'=>'Enter Mobile Number', 'autocomplete'=>'off', 'placeholder'=>'Enter Mobile Number', 'class' => 'form-control'])->label(false) ?>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-custom btn-sm btn-block">Start Now</button>
									
                                </div>
                                <span class="help-block m-b-0 m-t-20 text-muted"><small>By registering you agree to the SMSBird <a href="terms">Terms of Use</a></small></span>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- END HOME -->

        <!-- SERVICES -->
        <section class="section bg-custom" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1 class="title" data-aos="fade-up">Features</h1>
                    </div> 
                </div> <!--end row-->

                <div class="row">
                    <div class="col-sm-4">
                        <div class="service-item" data-aos="fade-up">
                            <i class="pe-7s-diamond"></i>
                            <div class="service-detail">
                                <h4>Complete analytics</h4>
                                <p>Track SMS messages, view historical campaigns, access delivery reports, and more through our online dashboard. .</p>
                            </div> <!-- /service-detail -->
                        </div> <!-- /service-item -->
                    </div> <!-- /col -->

                    <div class="col-sm-4">
                        <div class="service-item" data-aos="fade-up">
                            <i class="pe-7s-tools"></i>
                                <div class="service-detail">
                                    <h4>Two-way SMS messaging</h4>
                                    <p>Want people to respond to your SMS messages? Receive inbound SMS with active long codes and short codes</p>
                                </div> <!-- /service-detail -->
                        </div> <!-- /service-item -->
                    </div> <!-- /col -->

                    <div class="col-sm-4">
                        <div class="service-item" data-aos="fade-up">
                            <i class="pe-7s-radio"></i>
                                <div class="service-detail">
                                    <h4>Web  SMS</h4>
                                    <p><b>One way bulk SMS solution</b>
From any web browser or connected mobile device, send high-volume SMS messages through the use of desktop messaging.
Enable your customers and employees to receive and respond rapidly via SMS
.</p>
                                </div> <!-- /service-detail -->
                        </div> <!-- /service-item -->
                    </div> <!-- /col -->       
                </div> <!--end row -->


                <div class="row">
                    <div class="col-sm-4">
                        <div class="service-item" data-aos="fade-up">
                            <i class="pe-7s-joy"></i>
                                <div class="service-detail">
                                    <h4>Feed SMS</h4>
                                    <p><b>Two way SMS solution</b>power a 2-way SMS communication channel where recipients can respond to a short code via SMS. 
Adopt to drive services e.g. Competitions, feedbacks on raised topics, voting. 
</p>
                                </div> <!-- /service-detail -->
                        </div> <!-- /service-item -->
                    </div> <!-- /col -->

                    <div class="col-sm-4">
                        <div class="service-item" data-aos="fade-up">
                            <i class="pe-7s-plug"></i>
                                <div class="service-detail">
                                    <h4>Campaign manager</h4>
                                    <p>Effective mobile marketing campaigns over SMS. Vernacular language support, Bulk personalized messaging, Up to 20 M Contact lists support</p>
                                </div> <!-- /service-detail -->
                        </div> <!-- /service-item -->
                    </div> <!-- /col -->

                    <div class="col-sm-4">
                        <div class="service-item" data-aos="fade-up">
                            <i class="pe-7s-wristwatch"></i>
                                <div class="service-detail">
                                    <h4>Subscription Content</h4>
                                    <p>Subscription services for your audience, Breaking News alerts. Sports football news, Jokes, Inspirational messages. </p>
                                </div> <!-- /service-detail -->
                        </div> <!-- /service-item -->
                    </div> <!-- /col -->         
                </div> <!-- end row -->
				
				  <div class="row">
                    <div class="col-sm-4">
                        <div class="service-item" data-aos="fade-up">
                            <i class="pe-7s-chat"></i>
                                <div class="service-detail">
                                    <h4>Text live</h4>
                                    <p><b>Live interactive communication with media stations: Receive requests ; Music charts voting ; Surveys and opinion polls ; Competition and quizzes ; Music download ; Interactive responses;
</p>
                                </div> <!-- /service-detail -->
                        </div> <!-- /service-item -->
                    </div> <!-- /col -->

                    <div class="col-sm-4">
                        <div class="service-item" data-aos="fade-up">
                            <i class="pe-7s-vector"></i>
                                <div class="service-detail">
                                    <h4>Multiple Codes</h4>
                                    <p>Support, manage different codes : Free messages through Alphanumerics, long codes, or numeric codes ; Charged/premium numeric codes
</p>
                                </div> <!-- /service-detail -->
                        </div> <!-- /service-item -->
                    </div> <!-- /col -->

                    <div class="col-sm-4">
                        <div class="service-item" data-aos="fade-up">
                            <i class="pe-7s-coffee"></i>
                                <div class="service-detail">
                                    <h4>Dedicated Support</h4>
                                    <p>Round the clock Customer Care.</p>
                                </div> <!-- /service-detail -->
                        </div> <!-- /service-item -->
                    </div> <!-- /col -->         
                </div> <!-- end row -->
				
				
            </div> <!--end container-->
        </section>
        <!-- END SERVICES -->



        <!-- PRICING -->
        <section class="section bg-gray" id="pricing">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1 class="title" data-aos="fade-up">Simple Pricing</h1>
                    </div> 
                </div> <!-- end row -->

          
                <div class="row"> 

                    <!-- Pricing Item -->
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="pricing-item" data-aos="fade-up">
                            <div class="pricing-item-inner">
                                <div class="pricing-wrap">     
                            
                                    <!-- Pricing Title -->
                                    <div class="pricing-title">
                                      BASIC Pack
                                    </div>          
                                    <!-- Pricing Features -->
                                    <div class="pricing-features">
                                        <ul class="sf-list pr-list">
                                            <li>1 - 100,000 SMS</li>
                                            <li>20 Free bonus SMS</li>
                                            <li>Unlimited Contact Lists</li>
                                                                                        <li>Free Support</li>
                                        </ul>
                                    </div>
                                    <div class="pricing-num">
                                        <sup>Kshs</sup>1.0
                                    </div>
                                    <div class="pr-per">
                                        per SMS
                                    </div>                      
                                    <!-- Button -->                     
        
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- End Pricing Item -->

                  <!-- Pricing Item -->
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="pricing-item main" data-aos="fade-up">
                            <div class="pricing-item-inner">
                                <div class="pricing-wrap">     
                            
                                    <!-- Pricing Title -->
                                        <div class="pricing-title">
                                            Standard Pack
                                        </div>          
                                    <!-- Pricing Features -->
                                    <div class="pricing-features">
                                        <ul class="sf-list pr-list">
                                            <li>100,001 - 250,000 SMS</li>
                                            <li>20 Free bonus SMS</li>
                                            <li>Unlimited Contact Lists</li>
                                             <li>Free Support</li>
                                        </ul>
                                    </div>
                                    <div class="pricing-num">
                                      <sup>Kshs</sup>0.8
                                    </div>
                                    <div class="pr-per">
                                      per SMS
                                    </div>                      
                                    <!-- Button -->                     
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- End Pricing Item -->

                  <!-- Pricing Item -->
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="pricing-item" data-aos="fade-up">
                            <div class="pricing-item-inner">
                                <div class="pricing-wrap"> 

                                <!-- Pricing Title -->
                                    <div class="pricing-title">
                                      Enterprise Pack
                                    </div>          
                                    <!-- Pricing Features -->
                                    <div class="pricing-features">
                                        <ul class="sf-list pr-list">
                                            <li>250,001 + SMS</li>
                                            <li>20 Free bonus SMS</li>
                                            <li>Unlimited Contact Lists</li>
											<li>Account Manager</li>
                                             <li>Round the Clock Support</li>
                                        </ul>
                                    </div>
                                    <div class="pricing-num">
                                        <sup>Kshs</sup>0.7
                                    </div>
                                    <div class="pr-per">
                                         per SMS
                                    </div>                      
                                    <!-- Button -->                     
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Pricing Item -->  
                </div> <!--end row-->
            </div> <!--end container-->
        </section>
        <!-- END PRICING -->


