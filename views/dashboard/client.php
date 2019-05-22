<?php
use yii\widgets\Pjax;
use yii\helpers\Html;

/* @var $this yii\web\View */
$script = <<< JS

$(document).ready(function(){
        $.ajax({
            type:'get',
            url:'stats',
            dataType: "json",
            success:function(data){
		console.log(data);
//		alert(data.success);
                if(data.success == true){
//			alert(data.results.totalSMS);
                    $('#totalSent').text(data.results.totalSMS);
                    $('#success').text(data.results.success);
                    $('#failed').text(data.results.failed);
                    $('#queue').text(data.results.queued);
                }else{
                } 
            }
        });

});
JS;
$this->registerJs($script);
?>
					<header class="page-header">
						<h2>Dashboard</h2>
				
					</header>
										<!-- start: page -->
					<section class="call-to-action call-to-action-primary call-to-action-top mb-4">
						<div class="container">
        <div class="row">
          <div class="col-xl-3">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
	
                    <div class="media-body text-center">
                      <h3 class="text-info"><strong><span id="totalSent"><span class="fa fa-spinner fa-spin" style="font-size:24px"></span></span></strong> </h3>
                      <h6  class="text-info">Sent Messages</h6>
                    </div>
           
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
                    <div class="media-body text-center">
					           
                      <h3  class="text-success"><strong><span id="success"><span class="fa fa-spinner fa-spin" style="font-size:24px"></span></span></strong></h3>
                      <h6 class="text-success">Delivered Messages</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
              
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-center">
					          			
                      <h3 class="text-danger"><strong><span id="failed"><span class="fa fa-spinner fa-spin" style="font-size:24px"></span></span></strong></h3>
                      <h6 class="text-danger">Failed Messages</h6>
                    </div>
                    <div>
                      <i class="icon-user-unfollow danger font-large-2 float-right"></i>
                    </div>
             
                </div>
              </div>
         
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-center">
                      <h3 class="text-danger"> <strong>
					  <span id="queue"><span class="fa fa-spinner fa-spin" style="font-size:24px"></span></span></strong></h3>
                      <h6 class="text-danger"> QUEUE/UNSENT MESSAGES</h6>
                    </div>
                    <div>
                      <i class="icon-speedometer danger font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
						</div>
						
					</section>
				

	<div class="container section-full-width-bg-light">
  <div class="row">
                        <div class="col-xl-12  section-full-width-bg-light">
						      <div class="card section-full-width-bg-light">
                                <div class="card-body section-full-width-bg-light">
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
						 </div>					 
