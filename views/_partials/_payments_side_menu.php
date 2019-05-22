<?php

		
function add_class_active($menu, $route) {

    foreach ($menu as $pkey => $pvalue) {
//         echo '<pre>';  print_r($menu);die;
        if (is_array($pvalue)) {
            if (isset($pvalue['links'])) {
                $pvalue['links'] = add_class_active($pvalue['links'], $route);
                //$menu[$pkey] = $pvalue;
                foreach ($pvalue['links'] as $value) {
                    if (isset($value['class']) && $value['class'] == 'active') {
                        $pvalue['class'] = 'active';
                        $menu[$pkey] = $pvalue;
                    } else {
                        //if route has module/controller_id
                        if (strpos($route,
                                substr($pvalue['url'], 0,
                                    strrpos($pvalue['url'], '/'))) !== false) {
                            $pvalue['class'] = 'active';
                            $menu[$pkey] = $pvalue;
                        }
                    }
                }
            } else {
                if ($pvalue['url'] == $route) {
                    $pvalue['class'] = 'active';
                    $menu[$pkey] = $pvalue;
                }
            }
        }
    }

    return $menu;
}
    Yii::$app->view->params['menu'] = '  <div class="navbar-default" role="navigation">
                    <div class="navbar-collapse collapse sidebar-navbar-collapse">
            <ul class="nav navbar-nav side-nav">

                                                <li class="selected active">
                            <a class="class=&#039;selected active&#039;" href="/hub/client/index.php/sPayments/admin">Manage Payments<span class="fa arrow"></span></a>                                    <ul class="active-menu">

                                                                                <li>
                                                <a class="active" href="/hub/client/index.php/sPayments/admin">-- Payments <span class="glyphicon glyphicon-menu-right"></span></a>                                            </li>
                                                                                        <li>
                                                <a href="/hub/client/index.php/sPayments/payments">-- Batch Acknowledge </a>                                            </li>
                                                                                        <li>
                                                <a href="/hub/client/index.php/reconTool/admin">-- Escalated Payments </a>                                            </li>
                                                                            </ul>
                                                        </li>  
                                </ul>

        </div>
		  </div>';
		  


//$this->renderPartial('//layouts/_add_class_active', array(
//    'menu' => $menu));
