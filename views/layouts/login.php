<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use app\assets\LoginAppAsset;
use app\widgets\Alert;
use yii\helpers\Url;

LoginAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
       <title>MM_Content </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured contest marketing platform." name="description" />
        <meta content="MM_Content" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= Yii::getAlias('@web/theme') ?>/assets/images/favicon.ico">
   <?= Html::csrfMetaTags() ?>
        <!-- App css -->
       <?php $this->head() ?>


    </head>

    <body class="auth-fluid-pages pb-0">
	<?php $this->beginBody()?>
        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-left">
                            <a href="#">
                                <span><img src="<?= Yii::getAlias('@web/theme') ?>/assets/images/logo-light.png" alt="" height="18"></span>
                            </a>
                        </div>

           <?= $content ?> 

                    

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">I love the color!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very much! . <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                        -Change
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- App js -->
         <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
