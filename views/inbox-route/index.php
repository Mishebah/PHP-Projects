<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use common\widgets\Alert;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InboxRouteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inbox';
$this->params['breadcrumbs'][] = $this->title;
?>

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
 <div class="row">
  <div class="col-sm">
	<?= $form->field($searchModel, 'MESSAGE')->textInput(['autofocus' => true,'title'=>'Message ',  'placeholder'=>'Message']) ?>

	            </div>
				  <div class="col-sm">
	<?= $form->field($searchModel, 'SOURCEADDR')->textInput(['autofocus' => true,'title'=>'Mobile Number ',  'placeholder'=>'Mobile Number']) ?>

	            </div>
				  <div class="col-sm">
	<?= $form->field($searchModel, 'DESTADDR')->textInput(['autofocus' => true,'title'=>'Shortcode ',  'placeholder'=>'Shortcode']) ?>
	            </div>
				
 <div class="col-2">
<?= $form->field($searchModel, 'dateFrom')->widget(\pheme\jui\DateTimePicker::className(),['dateFormat' => 'yyyy-MM-dd','options' => ['placeholder' => "Select Date To ",'class'=>'form-control',"autocomplete"=>"off"]])->label("From") ?>

			</div>
			 <div class="col-2">
<?= $form->field($searchModel, 'dateTo')->widget(\pheme\jui\DateTimePicker::className(),['dateFormat' => 'yyyy-MM-dd','options' => ['placeholder' => "Select Date To ",'class'=>'form-control',"autocomplete"=>"off"]])->label("To") ?>

			</div>
        <div class="col-2">
		<br />
          <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
            </div>

    </div>
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
       //     'broadcastID',
        //    'inboxID',
            'SOURCEADDR',
            'DESTADDR',
           // 'NETID',
           // 'ORIGIN',
            // 'UDH',
            'MESSAGE',
            // 'status',
            // 'processed',
            // 'numberOfSends',
            // 'remoteID',
            // 'updatedTime',
             'dateCreated',



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
			  
			  

			  