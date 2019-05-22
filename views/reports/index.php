<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use  yii\helpers\Url;
use app\models\Reports;
use app\models\Mnemonics;
use kartik\grid\GridView;
use app\models\Clients;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transaction Reports');
$this->params['breadcrumbs'][] = $this->title;
		$cond= ['reportTypeID' => 1];
		if(yii::$app->user->identity->clientID != Yii::$app->params['ADMIN_CLIENT_ID'])
			$cond['reportTypeID']= 2 ;
		
$reports=ArrayHelper::map(Reports::find()->where($cond)->asArray()->all(), 'reportID', 'reportName');
//we handle the mnenomics here now 
if(!isset($selectedReportID) and isset($_REQUEST['Reports']['reportID']))
	$selectedReportID = $_REQUEST['Reports']['reportID'];
if (isset($selectedReportID)) {
	$selected = ''.$selectedReportID.'';
	$reportsModel = Reports::findOne((int) $selected);
	$reportsql = isset($reportsModel->reportQuery)?$reportsModel->reportQuery:"" ;
	$presentMnemonics = array();
if (isset($reportsql)){
	$mnemonics = ArrayHelper::map(Mnemonics::find()->asArray()->all(),'mnemonicID','mnemonicName');
	//print_r($mnemonics);
		$count=0;
	$countFound = 0;
	$configuredMnemonics = array();
	$matchedMnemonics = array();
	foreach ($mnemonics as $mnemon => $value) {

		$mnemonics[$mnemon] = $value;
		$configuredMnemonics[$count] = $value ;

		$pos = strrpos($reportsql,$value );

		if ($pos == true) {	
			$arrayKey = str_replace("^","",$value );
			$matchedMnemonics[$arrayKey] = $value ;
		}
		
		$count++;
	}
}

}

?>
<header class="page-header">
						<h2><?= Html::encode($this->title) ?></h2>
					</header>	
					<section class="search-content">

                        <div class="row">
                            <div class="col-md-12">




 <div class="card  card-primary">
              <div class="card-content">
                <div class="card-body">
					<h3 class="card-title display-3 text-warning">Reports  </h1>
<hr />
                                                    <!-- BEGIN FORM-->
                                                  
											<?php $form = ActiveForm::begin([
											//	'action' => ['index'],
												'method' => 'get',
												'options' => [
													'class'=>'form-horizontal',
												],
											]); ?>
                                                        <div class="form-body">
														<div class="row">
                                                                <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Report:</label>
                                                                <div class="col-md-9">
 <?php

 echo $form->field($model, 'reportID')->dropDownList($reports, 
             ['prompt'=>'-Choose a report --',
              'onchange'=>'this.form.submit()'])->label(false); 
 ?>
 <?php if (!isset($selectedReportID)){ ?>
 <span class="help-block"> Select the report  </span>
 		<?php } ?>	
                                                                </div>
                                                            </div>
                                                                </div>
                                                                <div class="col-md-4">
																             <?php if (isset($matchedMnemonics['DATEFROM'])){ ?>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">From:</label>
                                                                <div class="col-md-9">
                                               
																		<?php
		$dateFrom  =  date('Y-m-d',strtotime("-1 month"));													
if(isset($_GET['dateFrom']))
	$dateFrom = $_GET['dateFrom'];

echo \yii\jui\DatePicker::widget([
    'name'  => 'dateFrom',
	'dateFormat' => 'yyyy-MM-dd',
	 'options' => ['class' => 'form-control'],
      'value'  => $dateFrom ,
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
]);
?>
			
				
  </div>
                                                            </div>
															 </div><div class="col-md-4">
			<?php } if (isset($matchedMnemonics['DATETO'])){ ?>
				  <div class="form-group">
                                                                <label class="col-md-3 control-label">To:</label>
                                                                <div class="col-md-9">
																						<?php
		$dateTo  = date('Y-m-d');													
if(isset($_GET['dateTo']))
	$dateTo = $_GET['dateTo'];
echo \yii\jui\DatePicker::widget([
    'name'  => 'dateTo',
	 'options' => ['class' => 'form-control'],
	'dateFormat' => 'yyyy-MM-dd',
    'value'  => $dateTo,
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
]);
?>
  </div>
</div>
<?php }?>

                                                                    
                                                                </div>

                                                            </div>

															<div class="row">
                                                                <div class="col-md-4">
																             <?php if (isset($matchedMnemonics['CLIENTID']) and (yii::$app->user->identity->clientID == Yii::$app->params['ADMIN_CLIENT_ID']))
																			 {	 ?>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Clients:</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                
 <?php 
 
 $clients=Clients::find()->all();
//use yii\helpers\ArrayHelper;
$listData=ArrayHelper::map($clients,'clientID','clientName');
echo Html::dropDownList('clientID',(isset($_REQUEST['clientID'])?$_REQUEST['clientID']:""),ArrayHelper::map($clients,'clientID','clientName'),['prompt'=>'Select...','class' => 'form-control']);
						
	?>
			
				</div>
  </div>
                                                            </div>
															 </div><div class="col-md-4">
			<?php } if (isset($matchedMnemonics['MSISDN']))
			{ ?>
				  <div class="form-group">
                                                                <label class="col-md-3 control-label">Mobile Number:</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-mobile"></i>
                                                                        </span>
																						<?php
															
	echo Html::textInput("msisdn", (isset($_REQUEST['msisdn'])?$_REQUEST['msisdn']:""), ['prompt'=>'Select...','class' => 'form-control']);
?>
				</div>
  </div>
</div>
<?php }?>

                                                                    
                                                                </div>

                                                            </div>


			
                                                        </div>
                                                      
                                                            <div class="row">
                                                                <div class=" col-md-4">
																<br />
																        <?= Html::submitButton(Yii::t('app', 'Generate Report'), ['class' => 'btn btn-sm btn-success','id' => 'generateReport', 'name' => 'generateReport']) ?>
							
                                                                </div>
                                                            </div>
                                                      
                                                      <?php ActiveForm::end(); ?>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>
											
</div></div>
                            <div class="col-md-12">
 <div class="card  card-primary">
              <div class="card-content">
                <div class="card-body">
<div class ="col-md-12  card-body card-featured card-featured-primary">
    <p>
		  <?= Alert::widget() ?>	
    </p>
    <?php
if(isset($dataProvider) and isset($columns))
{
	  echo "<h1 class=\"card-title display-3 text-warning\">$title</h1>";
echo "<div class=\"clearfix\"><hr /></div>";

echo 	   GridView::widget([
        'dataProvider' => $dataProvider,
                           'pager' => [
        'linkOptions' => ['class' => 'page-link'],
                'options' => ['class' => 'pagination'],
    ],
       // 'filterModel' => $searchModel,
'columns'=>$columns,
		'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
    'headerRowOptions' => ['class' => 'kartik-sheet-style'],
    'filterRowOptions' => ['class' => 'kartik-sheet-style'],
'exportContainer' => ['class' => 'btn-group-sm'],
               'options'=>['class'=>''],

          'toolbar' => [
        [
            'content'=> '',
// 'options' => ['class' => 'btn-group mr-2']
        ],
        '{export}',
        '{toggleData}'
    ],
    'toggleDataContainer' => ['class' => 'btn-group mr-2'],
         'responsive'=>true,
    'hover'=>true,
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
        'pager' => [
                    'options'=>['class'=>'pagination'],   // set clas name used in ui list of pagination
                    'prevPageLabel' => 'Previous',   // Set the label for the "previous" page button
                    'nextPageLabel' => 'Next',   // Set the label for the "next" page button
                    'firstPageLabel'=>'First',   // Set the label for the "first" page button
                    'lastPageLabel'=>'Last',    // Set the label for the "last" page button
                    'nextPageCssClass'=>'next',    // Set CSS class for the "next" page button
                    'prevPageCssClass'=>'prev',    // Set CSS class for the "previous" page button
                    'firstPageCssClass'=>'first',    // Set CSS class for the "first" page button
                    'lastPageCssClass'=>'last',    // Set CSS class for the "last" page button
                    'maxButtonCount'=>10,    // Set maximum number of page buttons that can be displayed
            ],
'panel' => [
        'type' => GridView::TYPE_DEFAULT,
// 'heading' => $this->title,
    ],


    ]);  

}

?>
</div></div>
	</div>	</div>
	</section>
