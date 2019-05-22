<?php
use yii\widgets\Pjax;
use yii\helpers\Html;

/* @var $this yii\web\View */
?>
                        <h1 class="page-title">Daily Dashboard -
                            <small><?=date("d-M-Y") ?></small>
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
		

						
			                    <div class="row">
                        <div class="col-lg-6 col-md-12">
						      <div class="card">
                                <div class="card-header card-header-info">
                                    <h3 class="card-title"><?=date("d-M-Y") ?> Traffic </h3>
                                    <p class="card-category">Daily summary</p>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                            <th>Status</th>
                                            <th>Count </th>
                                           
                                        </thead>
                                        <tbody>
										     <tr>
                                                <td>Total</td>
                                                <td><?=number_format(isset($summaryStats[0]['dtotal'])?$summaryStats[0]['dtotal']:0) ?></td>
                                                </tr>
                                            <tr>
                                            <tr>
                                                <td>Success</td>
                                                <td><?=number_format(isset($summaryStats[0]['dsuccess'])?$summaryStats[0]['dsuccess']:0) ?></td>
                                                </tr>
                                            <tr>
                                                <td>Failed</td>
                                                <td><?=number_format(isset($summaryStats[0]['dfailed'])?$summaryStats[0]['dfailed']:0) ?></td>
                                                </tr>
                                            <tr>
                                                <td>Queued</td>
                                                <td><?=number_format(isset($summaryStats[0]['dqueued'])?$summaryStats[0]['dqueued']:0) ?></td>
                                                </tr>												
                                        </tbody>
                                    </table>
                                </div>
                            </div>							
						                        </div>

                        <div class="col-lg-6 col-md-12">
						      <div class="card">
                                <div class="card-header card-header-info">
                                    <h3 class="card-title"><?=date("d-M-Y") ?> Scheduled Messages </h3>
                                  
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
										 
                                            <th>Inbox Status</th>
                                            <th>Scheduled Total </th>
                                           
                                        </thead>
                                        <tbody>
										<?php
										foreach ($broadcastStats as $broadcastStat) {										
										?>
												<tr>
                                                <td><?=$broadcastStat['broadcastStatusName'] ?></td>
                                                <td><?=number_format($broadcastStat['schedules']) ?></td>
                                                </tr>
                                          <?php
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>							
						                        </div>
												
												</div>
						<br />
						<hr />
                      <h1 class="page-title">Message Statistics
                            <small><b><?=date("d-M-Y") ?></b> Graphs</small>
                        </h1>
												<hr />

						 			                    <div class="row">
                        <div class="col-lg-12 col-md-12">
						      <div class="card">
                                <div class="card-header card-header-info">
                                    <h3 class="card-title"><?=date("d-M-Y") ?> Traffic </h3>
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
      \"title\": { \"text\": \"Message Activity\" }, 
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

						 </div>					 
