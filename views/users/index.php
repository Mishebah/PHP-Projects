<?php
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\components\StatusCodes;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\ButtonDropdown;
use common\widgets\Alert;
use app\models\Clients;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
	$cond = ['ACTIVE' =>StatusCodes::ACTIVE];
								if(!yii::$app->user->identity->clientID == Yii::$app->params['ADMIN_CLIENT_ID'])
									$cond['clientID'] = yii::$app->user->identity->clientID ;
		
$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
					<section class="search-content">
<div class="card card-primary">
              <div class="card-content">
                <div class="card-body">
	  <?= Alert::widget() ?>	
		       <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
 <div class="row">
     
  <div class="col s3">
	<?= $form->field($searchModel, 'userName')->textInput(['autofocus' => true,'title'=>'Enter user name ',  'placeholder'=>'Enter user name']) ?>

	            </div>
            <div class="col s3">
	        <?=$form->field($searchModel, 'clientID')->dropDownList(ArrayHelper::map(Clients::find()->where($cond)->all(),'clientID','clientName'),['prompt'=>'Select Client'])?>	            </div>
        <div class="col s2">
		<br />
          <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-outline-info']) ?>
            </div>

    </div>
	<?php ActiveForm::end(); ?>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
					
					
        <?= Html::a(Html::tag('i', '', ['class' => '"ft-plus white']) .' Create User', ['create'], ['class' => 'btn btn-outline-secondary']) ?>
    
      
    </p>
               
  <?= GridView::widget([
        'dataProvider' => $dataProvider,
									   'pager' => [
	'linkOptions' => ['class' => 'page-link'],
		'options' => ['class' => 'pagination'],
    ],
     //   'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'userID',
            'client.clientName',
            'userName',
            'fullNames',
            'emailAddress:email',
            // 'IDNumber',
            // 'MSISDN',
            // 'password',
            // 'passwordAttempts',
			'groups.groupName',
             'passwordStatus.passwordStatus',
            // 'datePasswordChanged',
           //  'active',
			 [
        'attribute' => 'status',
        'value' => function($model) {
          return app\components\CoreUtils::getStatusDescription($model->status);
			}
      ],

			 //getStatusDescription
            // 'dateActivated',
             'dateCreated',
             'dateModified',
            // 'updatedBy',
            // 'createdBy',
           [
		'class' => '\kartik\grid\ActionColumn',
    'template' => '{reset} {view} {update} {delete}',
    'buttons' => [
        'reset' => function ($url) {
            return Html::a(
                '<i class="fas fa-redo"></i>',
				
                $url, 
                [
                    'title' => 'Reset Password',
                    'data-pjax' => '0',
					 'onClick' => 'return confirm(" Reset Password For this user")',
                ]
            );
        },
    ],
],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

                     
                  </div>
                </div>
              </div>
			    </section> 

			  
