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
use app\components\StatusCodes;
use app\assets\LoginAppAsset;
AppAsset::register($this);
$cond = ['ACTIVE' =>StatusCodes::ACTIVE];
								if (isset(Yii::$app->params['ADMIN_USER_ID']) and yii::$app->user->identity->userID == Yii::$app->params['ADMIN_USER_ID'])
									{$cond['clientID'] = yii::$app->user->identity->clientID ;
									}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
       <title>MM_Content</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured contest marketing platform." name="description" />
        <meta content="MM_Content" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= Yii::getAlias('@web/theme') ?>/assets/images/favicon.ico">
   <?= Html::csrfMetaTags() ?>
        <!-- App css -->
       <?php $this->head() ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<?php $this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js'); ?>
    </head>
    <body>
<?php $this->beginBody()?>
        <!-- Begin page -->
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!-- LOGO -->
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="<?= Yii::getAlias('@web/theme') ?>/assets/images/logo.png" alt="" height="16">
                        </span>
                        <span class="logo-sm">
                            <img src="<?= Yii::getAlias('@web/theme') ?>/assets/images/logo_sm.png" alt="" height="16">
                        </span>
                    </a>

                    <!--- Sidemenu -->
                    <ul class="metismenu side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>
<?php echo (PermissionUtils::checkModulePermission("Dashboard")) ?  '<li class="side-nav-item">'.	Html::a('<i class="dripicons-meter"></i><span>Dashboard</span>',
    [''],['class'=>'side-nav-link']).'</li>':"";	?>
	
	 
						<?php if (PermissionUtils::checkModulePermission("users") or PermissionUtils::checkModulePermission("clients") ) : ?>

			<?php endif;?>
			
			                        
                                 <?php echo (PermissionUtils::checkModulePermission("Users")) ?  '<li class="side-nav-item">'.	Html::a('<i class="dripicons-view-apps"></i><span>Orders</span>',
    ['orders/index'],['class'=>'side-nav-link']).'</li>':"";	?>
                            
                        
<?php echo (PermissionUtils::checkModulePermission("users")) ?  '<li class="side-nav-item">'.	Html::a('<i class="dripicons-view-apps"></i><span>InMessages</span>',
    ['in-messages/index'],['class'=>'side-nav-link']).'</li>':"";	?>
                        <?php echo (PermissionUtils::checkModulePermission("users")) ?  '<li class="side-nav-item">'.	Html::a('<i class="dripicons-view-apps"></i><span>OutMessages</span>',
    ['out-messages/index'],['class'=>'side-nav-link']).'</li>':"";	?>
                         <?php echo (PermissionUtils::checkModulePermission("users")) ?  '<li class="side-nav-item">'.	Html::a('<i class="dripicons-view-apps"></i><span>Paybill</span>',
    ['paybill/index'],['class'=>'side-nav-link']).'</li>':"";	?>
    <?php echo (PermissionUtils::checkModulePermission("content")) ?  '<li class="side-nav-item">'. Html::a('<i class="dripicons-view-apps"></i><span>Content</span>',
    ['content/index'],['class'=>'side-nav-link']).'</li>':"";  ?>
                         <?php echo (PermissionUtils::checkModulePermission("users")) ?  '<li class="side-nav-item">'. Html::a('<i class="dripicons-view-apps"></i><span>Downloads</span>',
    ['downloads/index'],['class'=>'side-nav-link']).'</li>':"";  ?>
                        <?php if (isset(Yii::$app->params['ADMIN_USER_ID']) and yii::$app->user->identity->userID == Yii::$app->params['ADMIN_USER_ID'])
{

                         echo (PermissionUtils::checkModulePermission("users")) ?  '<li class="side-nav-item">'. Html::a('<i class="dripicons-view-apps"></i><span>Users</span>',
    ['users/index'],['class'=>'side-nav-link']).'</li>':"";  
                       echo (PermissionUtils::checkModulePermission("users")) ?  '<li class="side-nav-item">'. Html::a('<i class="dripicons-view-apps"></i><span>Clients</span>',
    ['clients/index'],['class'=>'side-nav-link']).'</li>':"";  }?>
	
	                  
                    
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
<?php
/*
                        <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-bell noti-icon"></i>
                                    <span class="noti-icon-badge"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0">
                                            <span class="float-right">
                                                <a href="javascript: void(0);" class="text-dark">
                                                    <small>Clear All</small>
                                                </a>
                                            </span>Notification
                                        </h5>
                                    </div>

                                    <div class="slimscroll" style="max-height: 230px;">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">1 min ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-account-plus"></i>
                                            </div>
                                            <p class="notify-details">New user registered.
                                                <small class="text-muted">5 hours ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Cristina Pride</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Hi, How are you? What about our next meeting</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">4 days ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Karen Robinson</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Wow ! this admin looks good and awesome design</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-heart"></i>
                                            </div>
                                            <p class="notify-details">Carlos Crouch liked
                                                <b>Admin</b>
                                                <small class="text-muted">13 days ago</small>
                                            </p>
                                        </a>
                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View All
                                    </a>

                                </div>
                            </li>
 */ ?>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="<?= Yii::getAlias('@web/theme') ?>/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
									<span class="account-position">User</span>
                                        <span class="account-user-name"><?=(isset(yii::$app->user->identity->username)?yii::$app->user->identity->username:'')?></span>
                                        
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
										  <?=Html::a('<i class="mdi mdi-account-circle mr-1"></i><span>My Account</span>',
    ['account/'],['class' => 'dropdown-item notify-item']) ?>
                                    <!-- item-->
<?=Html::a('<i class="mdi mdi-lifebuoy mr-1"></i><span>Support</span>',
    ['support/'],['class' => 'dropdown-item notify-item']) ?>
                                    <!-- item-->
                                 <?=Html::a('<i class="mdi mdi-logout mr-1"></i><span>Log OUT</span>',
    ['/site/logout'],
    ['class'=>'dropdown-item notify-item','style' => 'color: red;',"data-method"=>"post"]) ?>

                                </div>
                            </li>

                        </ul>
<?php
/*
                        <div class="app-search">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="mdi mdi-magnify"></span>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
						*/ ?>
                    </div>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
					                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Starter</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$this->title; ?></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                     <?= $content ?> 

                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                             MM_Content Portal
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-md-block">
								<?=Html::a('About',['about/']) ?>
								<?=Html::a('Support',['support/']) ?>
								<?=Html::a('Contact Us',['contact/']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
        <div class="right-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="slimscroll-menu rightbar-content">

                <!-- Settings -->
                <hr class="mt-0" />
                <h5 class="pl-3">Basic Settings</h5>
                <hr class="mb-0" />

                <div class="p-3">
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="notifications-check" checked>
                        <label class="custom-control-label" for="notifications-check">Notifications</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="api-access-check">
                        <label class="custom-control-label" for="api-access-check">API Access</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="auto-updates-check" checked>
                        <label class="custom-control-label" for="auto-updates-check">Auto Updates</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="online-status-check" checked>
                        <label class="custom-control-label" for="online-status-check">Online Status</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="auto-payout-check">
                        <label class="custom-control-label" for="auto-payout-check">Auto Payout</label>
                    </div>

                </div>


                <!-- Timeline -->
                <hr class="mt-0" />
                <h5 class="pl-3">Recent Activity</h5>
                <hr class="mb-0" />
                <div class="pl-2 pr-2">
                    <div class="timeline-alt">
                        <div class="timeline-item">
                            <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info font-weight-bold mb-1 d-block">You sold an item</a>
                                <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">5 minutes ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary font-weight-bold mb-1 d-block">Product on the Bootstrap Market</a>
                                <small>Dave Gamache added
                                    <span class="font-weight-bold">Admin Dashboard</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">30 minutes ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="mdi mdi-microphone bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info font-weight-bold mb-1 d-block">Robert Delaney</a>
                                <small>Send you message
                                    <span class="font-weight-bold">"Are you there?"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">2 hours ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="mdi mdi-upload bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary font-weight-bold mb-1 d-block">Audrey Tobey</a>
                                <small>Uploaded a photo
                                    <span class="font-weight-bold">"Error.jpg"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">14 hours ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info font-weight-bold mb-1 d-block">You sold an item</a>
                                <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">1 day ago</small>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="rightbar-overlay"></div>
        <!-- /Right-bar -->


        <!-- App js -->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
