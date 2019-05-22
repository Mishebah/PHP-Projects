<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Url;
use yii\base\Controller;
use yii\web\ForbiddenHttpException;
use app\components\PermissionUtils;
use app\components\CoreUtils;
use app\components\MenuServer;
use  yii\web\Session;
use yii\jui\Accordion;
use yii\bootstrap\Dropdown;
AppAsset::register($this);

$apiURL =Url::toRoute("/credits");



$script = <<< JS

function updateCredits() {
         $.ajax({
            type:'get',
            url: '$apiURL',
            dataType: "json",
            success:function(data){
		console.log(data);
//		alert(data.success);
                if(data.success == true){
//			alert(data.results.totalSMS);
                    $('#credits').text(data.credits);
                }else{
					$('#credits').text('<span class="fa fa-spinner fa-spin" style="font-size:24px"></span>');
                } 
            }
        });
}


$(document).ready(function(){
	
setInterval(function(){updateCredits(); }, 3000);
});
JS;
$this->registerJs($script);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="fixed">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <meta name="description" content="Percap content">
  <meta name="keywords" content="Percap content">
  <meta name="author" content="Percap">
  <title>Percap BulkSMS platform</title>

   	<!--begin::Web font -->
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

    <?= Html::csrfMetaTags() ?>
    <!--     Fonts and icons     -->
        <!-- iframe removal -->
	      <?php $this->head()?>
		  <script src="<?= Yii::getAlias('@web/theme') ?>/vendor/modernizr/modernizr.js"></script>
		  		  		<?php 
		//$this->registerJsFile(Yii::getAlias('@web/theme').'/app-assets/vendors/js/vendors.min.js');
		?>
<script src="https://cdn.jsdelivr.net/npm/moment@2/moment.min.js"></script>

</head>
	<body>
	<?php $this->beginBody()?>
			<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="<?=Url::base(true);?>" class="logo">
						<img src="<?= Yii::getAlias('@web/theme') ?>/img/plogo.png" width="95" height="45" alt="Percap Admin" />
					</a>
					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group " >

							 <span class="input-group-text highlight text-white"> <p class="h6 text-white">Credits : <b> <span id="credits"> <?= CoreUtils::getClientCredit() ?> </span></b></p></span>
					
						</div>
					</form>
			
					<span class="separator"></span>
			
					<ul class="notifications" >
					<div style ="min-width: 10em">
		<li id="time" class="h5 text-danger b"></li>
		</div>
<script>
//    moment().format();
function realtime() {
  
  let time = moment().format('h:mm:ss a');
  document.getElementById('time').innerHTML = time;
  
  setInterval(() => {
    time = moment().format('h:mm:ss a');
    document.getElementById('time').innerHTML = time;
  }, 1000)
}

realtime();
//var now = new moment();
//console.log(now.format("HH:mm:ss"));
</script>			
			<li class="">
			<?php /*echo (PermissionUtils::checkModulePermission("reports")) ?  Html::a('<i class="fas fa-chart-bar"></i>',
    ['reports/'],['title'=>"Reports",'class' => 'notification-icon']):""*/;	?> 
								   
									</li>
                   
					</ul>
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?= Yii::getAlias('@web/theme') ?>/img/!logged-user.jpg" alt="" class="rounded-circle" data-lock-picture="<?= Yii::getAlias('@web/theme') ?>/img/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="<?=yii::$app->user->identity->userName?>" data-lock-email="<?=yii::$app->user->identity->emailAddress?>">
								<span class="name"><?=yii::$app->user->identity->userName?></span>
								
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
														  <?=Html::a('<i class="fas fa-user"></i>Change Password',
    ['users/changepassword'],['role' => 'menuitem']) ?>
									
								</li>
								<li>
								 <?=Html::a('<i class="fas fa-power-off"></i> Logout',
    ['/site/logout'],
    ['role'=>'menuitem','style' => 'color: red;',"data-method"=>"post"]) ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
					<?php if (isset(yii::$app->user->identity->clientID) and  (!Yii::$app->user->isGuest)): ?>

				<aside id="sidebar-left" class="sidebar-left">
				
				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Main Menu
				        </div>
				        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>
				
				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">
				            
				                <ul class="nav nav-main">
<?php echo (PermissionUtils::checkModulePermission("Dashboard")) ?  '<li>'.	Html::a('<i class="fas fa-home" ,"aria-hidden"="true"></i><span>Dashboard</span>',
    ['/'],['class'=>'nav-link']).'</li>':"";	?>
	
		<?php echo (PermissionUtils::checkModuleActionPermission("Broadcasts",PermissionUtils::CREATE)) ?  '<li>'.	Html::a('<i class="fas fa-edit","aria-hidden"="true"></i><span>Send Message</span>',
    ['broadcasts/create']).'</li>':"";	?>
	
			<?php /*echo (PermissionUtils::checkModuleActionPermission("BulkUploads",PermissionUtils::CREATE)) ?  '<li>'.	Html::a('<i class="la la-cloud-upload"></i><span >Custom Upload Message</span>',
    ['bulk-uploads/create']).'</li>':""; */	?>
			<?php echo (PermissionUtils::checkModuleActionPermission("CustomUploads",PermissionUtils::CREATE)) ?  '<li>'.	Html::a('<i class="la la-cloud-upload"></i><span >Custom Message</span>',
    ['custom/']).'</li>':"";	?>
			<?php echo (PermissionUtils::checkModulePermission("ContactLists")) ?  '<li>'.	Html::a('<i class="fas fa-address-book"></i><span>Contacts</span>',
    ['contact-lists/']).'</li>':"";	?>
			<?php echo (PermissionUtils::checkModulePermission("Blacklist")) ?  '<li>'.	Html::a('<i class="fas fa-ban"></i><span>Black List</span>',
    ['blacklist/']).'</li>':"";	?>
<?php echo (PermissionUtils::checkModulePermission("broadcasts")) ?  '<li>'.	Html::a('<i class="la la-envelope"></i><span>Scheduled Messages</span>',
    ['broadcasts/']).'</li>':"";	?>
				<?php echo (PermissionUtils::checkModulePermission("CustomUploads")) ?  '<li>'.	Html::a('<i class="fas fa-copy"></i><span>Custom Outbox</span>',
    ['custom-uploads/'],['class'=>"nav-link"]).'</li>':"";	?>
				<?php echo (PermissionUtils::checkModulePermission("Inbox")) ?  '<li>'.	Html::a('<i class="fas fa-inbox"></i><span>Inbox/Received Messages</span>',
    ['inbox-route/'],['class'=>"nav-link"]).'</li>':"";	?>
			<?php echo (PermissionUtils::checkModulePermission("outbound")) ?  '<li>'.	Html::a('<i class="la la-comments"></i><span>Sent Messages</span>',
    ['outbound/'],['class'=>"nav-link"]).'</li>':"";	?>
                        <?php echo (PermissionUtils::checkModulePermission("outbound")) ?  '<li>'.      Html::a('<i class="la la-comments"></i><span>API Messages</span>',
    ['outbound/api'],['class'=>"nav-link"]).'</li>':"";    ?>

			<?php echo (PermissionUtils::checkModulePermission("reports")) ?  '<li>'.	Html::a('<i class="fas fa-chart-bar"></i><span>Reports</span>',
    ['reports/'],['class'=>"nav-link"]).'</li>':"";	?>
							  	<?php echo (PermissionUtils::checkModulePermission("CreditConsumption")) ?  '<li>'.	Html::a('<i class="la la-minus"></i><span class="menu-title" data-i18n="">Credit Consumption</span>',
    ['credit-consumption/']).'</li>':"";	?>
		  	<?php echo (PermissionUtils::checkModulePermission("CreditAllocation")) ?  '<li>'.	Html::a('<i class="la la-plus"></i><span class="menu-title" data-i18n="">Credit Allocation</span>',
    ['credit-allocation/']).'</li>':"";	?>
	 					<?php echo (PermissionUtils::checkModulePermission("sourceAddress")) ? 	'<li>'.Html::a('<i class="la la-phone"></i><span class="menu-title" data-i18n="">Short Codes</span>',
    ['source-addresses/'],['class'=>'nav-link']).'</li>':"";	?>
		  				<?php echo (PermissionUtils::checkModulePermission("services")) ?  	'<li>'.Html::a('<i class="la la-link"></i><span class="menu-title" data-i18n="">ShortCode Mapping</span>',
    ['services/'],['class'=>'nav-link']).'</li>':"";	?>
			  				<?php echo (PermissionUtils::checkModulePermission("servicekeywords")) ?  	'<li>'.Html::a('<i class="la la-info"></i><span class="menu-title" data-i18n="">Shortcode keywords</span>',
    ['service-keywords/'],['class'=>'nav-link']).'</li>':"";	?>
		  				<?php echo (PermissionUtils::checkModulePermission("Networks")) ?  '<li>'.Html::a('<i class="la la-globe"></i><span class="menu-title" data-i18n="">Network Configs</span>',
    ['networks/'],['class'=>'nav-link']).'</li>':"";	?>
	
<?php echo (PermissionUtils::checkModulePermission("clients")) ?  	'<li>'.Html::a('<i class="la la-table"></i><span class="menu-title" data-i18n="">Clients</span>',
    ['clients/'],['class'=>'nav-link']).'</li>':"";	?>
		  	<?php echo (PermissionUtils::checkModulePermission("users")) ?  '<li>'.Html::a('<i class="la la-users"></i><span class="menu-title" data-i18n="">Users</span>',
    ['users/'],['class'=>'nav-link']).'</li>':"";	?>
			  	<?php echo (PermissionUtils::checkModulePermission("apiusers")) ? '<li>'.Html::a('<i class="la la-user"></i><span class="menu-title" data-i18n="">API Users</span>',
    ['api-users/'],['class'=>'nav-link']).'</li>':"";	?>
		  	<?php echo (PermissionUtils::checkModulePermission("groups")) ?  '<li>'.Html::a('<i class="la la-object-group"></i><span class="menu-title" data-i18n="">Groups</span>',
    ['groups/'],['class'=>'nav-link']).'</li>':"";	?>
		  	<?php echo (PermissionUtils::checkModulePermission("permissions")) ?  '<li>'.Html::a('<i class="la la-lock"></i><span class="menu-title" data-i18n="">Permissions</span>',
    ['permissions/'],['class'=>'nav-link']).'</li>':"";	?>
				                </ul>
				            </nav>
				        </div>
				
				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
				                    
				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>
				        
				
				    </div>
				
				</aside>
				<!-- end: sidebar -->
  <?php
	 endif;
	 ?>
				<section role="main" class="content-body  pb-4">

					<!-- start: page -->
										<?= $content ?> 
					<!-- end: page -->
				</section>
			</div>


		</section>


	   <?php $this->endBody() ?>

	</body>
</html>

<?php $this->endPage() ?>
