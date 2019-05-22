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
<html class="fixed">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Percap BulkSMS Platform </title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="description">
<meta content="" name="author">
 <?= Html::csrfMetaTags() ?>
 		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
           google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
           active: function() {
                sessionStorage.fonts = true;
            }
          });
     </script>
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
<?php $this->head() ?>
<script src="<?= Yii::getAlias('@web/theme') ?>/vendor/modernizr/modernizr.js"></script>
</head>
<body>
	<?php $this->beginBody()?>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo float-left">
					<img src="<?= Yii::getAlias('@web/theme') ?>/img/apple-touch-icon-precomposed.png" height="54" alt="Bulk Admin" />
				</a>

<?= $content ?> 


				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2017. All Rights Reserved.</p>
			</div>
		</section>
        

        <?php $this->endBody() ?>
        
    </body>
    <!-- end::Body -->
</html>
<?php $this->endPage() ?>
