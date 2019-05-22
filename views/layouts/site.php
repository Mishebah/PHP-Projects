<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use app\assets\SiteAppAsset;
use app\widgets\Alert;
use yii\helpers\Url;
use yii\base\Controller;
use yii\web\ForbiddenHttpException;
use  yii\web\Session;
use yii\jui\Accordion;
SiteAppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="images/favicon.ico">

        <title>Percap BulkSMS platform</title>

        <!-- Google fonts -->
        <link href='http://fonts.googleapis.com/css?family=RobotoDraft:regular,bold,italic,thin,light,bolditalic,black,medium&lang=en' rel='stylesheet' type='text/css'>

       <?= Html::csrfMetaTags() ?>
    <!--     Fonts and icons     -->
        <!-- iframe removal -->
				  <script src="<?= Yii::getAlias('@web/site') ?>/js/jquery-2.1.4.min.js"></script>

				  
	      <?php $this->head()?>

    </head>

    <body>
	<?php $this->beginBody()?>

        <!-- Pre-loader -->
        <div class="preloader">
            <div class="status">&nbsp;</div>
        </div>

        <!-- Navbar -->
        <div class="navbar navbar-custom sticky navbar-fixed-top menu-dark" role="navigation">
            <div class="container">
                <!-- Navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="mdi mdi-format-align-left"></i>					
						
						<img src="<?= Yii::getAlias('@web/site/images') ?>/logo.jpeg" alt="SMSPerc">

                    </button>
                    <!-- LOGO -->
                    <a class="navbar-brand logo" href="#">
                        			<img src="<?= Yii::getAlias('@web/site/images') ?>/logo.jpeg" alt="SMSPerc">
                    </a>
                </div>
                <!-- end navbar-header -->

                <!-- menu -->
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?=Url::home(true);?>#started" class="nav-link">Started</a>
                        </li>
                        <li>
                            <a href="<?=Url::home(true);?>#services" class="nav-link">Features</a>
                        </li>
                        <li>
                            <a href="<?=Url::home(true);?>#pricing" class="nav-link">Pricing</a>
                        </li>
						                        <li>
                            <a href="<?=Url::toRoute('contact');?>" class="nav-link">Contact us</a>
                        </li>
						                        <li>
                            <a href="<?=Url::toRoute('login');?>" class="nav-link">Sign in</a>
                        </li>
												                        <li>
                            <a href="<?=Url::toRoute('signup');?>" class="nav-link">Register</a>
                        </li>
                    </ul>
                </div>
                <!--/Menu -->
            </div>
            <!-- end container -->
        </div>
        <!-- End navbar -->
        <div class="clearfix"></div>

	<?= $content ?> 

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6" data-aos="fade-up">
                      <h5>SMSBird</h5>
                      <ul class="list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><a href="services">Features</a></li>
                        <li><a href="about">About Us</a></li>
                      
                      </ul>
                    </div>

                    <div class="col-md-3 col-sm-6" data-aos="fade-up">
                      <h5>Social</h5>
                      <ul class="list-unstyled">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">LinkedIn</a></li>
                      </ul>
                    </div>

                    <div class="col-md-3 col-sm-6" data-aos="fade-up">
                      <h5>Support</h5>
                      <ul class="list-unstyled">
                        <li><a href="<?=Url::toRoute('contact');?>">Help & Support</a></li>
                        <li><a href="<?=Url::toRoute('terms');?>">Privacy Policy</a></li>
                        <li><a href="<?=Url::toRoute('terms');?>">Terms & Conditions</a></li>
                      </ul>
                    </div>

                    <div class="col-md-3 col-sm-6" data-aos="fade-up">
                      <h5>Contact</h5>
                      <address>
                        Adak House<br>
                        Nairobi<br>
                        <abbr title="Phone">P:</abbr> (254) 456-7890<br/>
                        E: <a href="mailto:contact@smsbird.com">contact@smsbird.com</a>
                      </address>
                    </div>
                </div> <!--end row-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="footer-alt text-center" data-aos="fade-up">
                            <p class="copyright-txt">2019 © SMSBird.com</p>
                        </div>
                    </div>
                </div> <!--end row-->
            </div><!--end container-->
        </footer>

        <!-- END FOOTER -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c3da6c9ab5284048d0d079f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

   <?php $this->endBody() ?>

    
  </body>
</html>
<?php $this->endPage() ?>
