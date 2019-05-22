<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OutboundSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
$this->title = 'Sent Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
hr.style3 {
	border-top: 1px dashed #8c8b8b;
}
table.c {
    table-layout: fixed;
    width: 100%;  
 border-spacing: 15px;
}
</style>

									<header class="page-header">
						<h2><?= Html::encode($this->title) ?></h2>
					</header>	
					<section class="search-content">

<div class="card">

              <div class="card-content">
                <div class="card-body">

				
	  <?= Alert::widget() ?>	
	       <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<div class="col-12">
<table class="c"><tr><td>
	<?= $form->field($searchModel, 'messageContent')->textInput(['autofocus' => true,'title'=>'Enter nessage ',  'placeholder'=>'Enter message']) ?>
</td><td>
		<?= $form->field($searchModel, 'MSISDN')->textInput(['autofocus' => true,'title'=>'Enter Mobile Number ', 'placeholder'=>'Enter Mobile Number']) ?>
</td><td>
		<?= $form->field($searchModel, 'sourceAddress')->textInput(['autofocus' => true,'title'=>'Enter sourceAddress ',  'placeholder'=>'Enter sourceAddress']) ?>
</td><td>
	        <?=$form->field($searchModel, 'statusCode')->dropDownList([1=>'Success',3=>'Failed',32=>'Pending Delivery Report',0=>'Unprocessed',10=>'Delivery Impossible',11=>'User Not Subscribed',7=>'Absent Subscriber',5=>'UserMTCallBarred',2=>'MessageWaiting',12=>'Insufficient_Balance',9=>'UserInBlacklist',6=>'UserNotExist',7=>"Error On Sending"],['prompt'=>'Select status'])->label('Status')?>	
</td><td>
<?= $form->field($searchModel, 'dateFrom')->widget(\pheme\jui\DateTimePicker::className(),['dateFormat' => 'yyyy-MM-dd','options' => ['placeholder' => "Select Date To ",'class'=>'form-control',"autocomplete"=>"off"]])->label("From") ?>
</td><td>
<?= $form->field($searchModel, 'dateTo')->widget(\pheme\jui\DateTimePicker::className(),['dateFormat' => 'yyyy-MM-dd','options' => ['placeholder' => "Select Date To ",'class'=>'form-control',"autocomplete"=>"off"]])->label("To") ?>
</td><td>
<br />
	
          <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Reset'),  ['index'], ['class' => 'btn btn-warning']) ?>
</td></tr></table> </div>
	<?php ActiveForm::end(); ?>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                  <!-- Invoices List table -->
                  <div class="table-responsive wrap">
       <?= GridView::widget([
        'dataProvider' => $dataProvider,
                           'pager' => [
        'linkOptions' => ['class' => 'page-link'],
                'options' => ['class' => 'pagination'],
    ],
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'outboundID',
        //    'transactionID',
            'message.messageContent',
//            'gatewayUUID',
            'sourceAddress',
            'MSISDN',
          //  'lastSend',
            'firstSend',
            //'priority',
            //'nextSend',
            //'expiryDate',
			                     [
        'attribute' => 'statusCode',
        'value' => function($model) {
//			$stat = [1=>'Success',3=>'Failed',32=>'Pending Delivery Report',0=>'Unprocessed'];
 $stat = [1=>'Success',3=>'Failed',32=>'Pending Delivery Report',0=>'Unprocessed',10=>'Delivery Impossible',11=>'User Not Subscribed',7=>'Absent Subscriber',5=>'UserMTCallBarred',2=>'MessageWaiting',12=>'Insufficient_Balance',9=>'UserInBlacklist',6=>'UserNotExist'];
			return isset($stat[$model->statusCode])?$stat[$model->statusCode]:'Failed';
			}
      ],
         //   'numberOfSends',
            //'delivered',
           // 'statusCode',
            //'deliveryTime',
            //'resend',
            //'resendFrequency',
            //'maxSends',
            'dateCreated',
            //'updatedBy',
            //'dateModified',

        //    ['class' => 'yii\grid\ActionColumn'],



        ],
		'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
    'headerRowOptions' => ['class' => 'kartik-sheet-style'],
    'filterRowOptions' => ['class' => 'kartik-sheet-style'],
'exportContainer' => ['class' => 'btn-group-sm'],
               'options'=>['class'=>''],

          'toolbar' => [
        [
            'content'=>
                     Html::a('<i class="fas fa-redo"></i> Refresh', ['index'], [
                    'class' => 'btn btn-outline-secondary',
                    'title' => 'Refresh ',
                         'data-pjax' => 1,
                ]),
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


    ]);  ?>
    <?php Pjax::end(); ?>

                    </div>
                  </div>
                </div>
              </div>
			  

			  
</section>
			  
			  
			  

			  
			  
