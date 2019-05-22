<?php
use yii\widgets\Pjax;
use yii\helpers\Html;

/* @var $this yii\web\View */
?>
                        <h1 class="page-title">Monthly Dashboard -
                            <small><?=date("F") ?></small>
                        </h1>
                        <!-- END PAGE TITLE--><!-- BEGIN DASHBOARD STATS 1-->
						<hr />

        <div class="row">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
	
                    <div class="media-body text-left">
                      <h3 class="info"><?php echo (isset($summaryStats[0]['totalSMS'])?$summaryStats[0]['totalSMS']:0); ?> </h3>
                      <h6>Sent Messages</h6>
                    </div>
                    <div>
                      <i class="icon-graph info font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
					           
                      <h3 class="warning"><?php echo (isset($summaryStats[0]['success'])?$summaryStats[0]['success']:0); ?></h3>
                      <h6>Delivered Messages</h6>
                    </div>
                    <div>
                      <i class="icon-pie-chart warning font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%"
                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
					          			
                      <h3 class="success"><?php echo (isset($summaryStats[0]['failed'])?$summaryStats[0]['failed']:0); ?></h3>
                      <h6>Failed Messages</h6>
                    </div>
                    <div>
                      <i class="icon-user-unfollow danger font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger"> <?php echo (isset($summaryStats[0]['queued'])?$summaryStats[0]['queued']:0); ?></h3>
                      <h6> QUEUE/UNSENT MESSAGES</h6>
                    </div>
                    <div>
                      <i class="icon-speedometer danger font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
						<hr />
						

						<br />
                      <h1 class="page-title"> Message Statistics
                            <small><b><?=date("F") ?></b> Graphs</small>
                        </h1>
												<hr />
						 			                    <div class="row">
                        <div class="col-lg-12 col-md-12">
						      <div class="card">
                                <div class="card-header card-header-info">
                                    <h3 class="card-title"><?=date("F") ?> Message Traffic </h3>
                                    <p class="card-category">Monthly summary</p>
                                </div>
                                <div class="card-body">
 <?php  
$drawseries=[]; 
 foreach($dayResults as $key =>$value) 
{  
        $drawseries[] = " { \"name\": \"".$key."\",  \"type\":\"column\",\"data\": ".json_encode($value, JSON_NUMERIC_CHECK)."    } "; 
}  
$drawseries = implode(",",$drawseries); 
 
//$data = "[5, 7,3]"; 
echo \miloschuman\highcharts\Highcharts::widget([ 
    'scripts' => [ 
        'modules/exporting', 
       // 'themes/grid-light', 
    ], 
   "options"=>"{ 
      \"title\": { \"text\": \"Message Activity\" }, 
      \"xAxis\": { 
         \"categories\":". $dayColumns." 
      }, 
      \"yAxis\": { 
         \"title\": { \"text\": \"Statisticts\" } 
      }, 
      \"series\": [".$drawseries."] 
   }" 
]); 
?>

                                </div>
                            </div>
							
						                        </div>

						 </div>	
<br />
                      <h1 class="page-title"> Subscriber Statistics
                            <small><b><?=date("F") ?></b> Graphs</small>
                        </h1>
                                                                                                <hr />
						
 
						 			                    <div class="row">
                        <div class="col-lg-8 col-md-12">
						      <div class="card">
                                <div class="card-header card-header-info">
                                    <h3 class="card-title"><?=date("F") ?> Traffic </h3>
                                    <p class="card-category">Daily summary</p>
                                </div>
                                <div class="card-body table-responsive">
 <?php  
$drawseries=[]; 
 foreach($subResults as $key =>$value) 
{  
        $drawseries[] = " { \"name\": \"".$key."\", \"data\": ".json_encode($value, JSON_NUMERIC_CHECK)."    } "; 
}  
$drawseries = implode(",",$drawseries); 
 
//$data = "[5, 7,3]"; 
echo \miloschuman\highcharts\Highcharts::widget([ 
    'scripts' => [ 
        'modules/exporting', 
       // 'themes/grid-light', 
    ], 
   "options"=>"{ 
      \"title\": { \"text\": \"Subscriber Activity\" }, 
      \"xAxis\": { 
         \"categories\":". $subColumns." 
      }, 
      \"yAxis\": { 
         \"title\": { \"text\": \"Statisticts\" } 
      }, 
      \"series\": [".$drawseries."] 
   }" 
]); 
?>

                                </div>
                            </div>
							
						                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header card-header-warning">
                                    <h3 class="card-title"><?=date("F") ?> Subscriber Total </h3>
                                    <p class="card-category">Channel Summary</p>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                            <th>Channel</th>
                                            <th>Subscribed this month </th>
                                          <th>UnSubscribed this month </th>

                                        </thead>
                                        <tbody>

										<?php
										foreach ($channelStats as $channel) {					
										?>
						<tr>
                                                <td><?=$channel['channelName'] ?></td>
                                                <td><?=number_format($channel['activeSubs']) ?></td>
                                                <td><?=number_format($channel['inactiveSubs']) ?></td>

                                                </tr>
                                          <?php
										}
										?>                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						 </div>		
