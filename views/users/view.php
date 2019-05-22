<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use common\widgets\Alert;
use yii\bootstrap\Modal;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = Yii::t('app', 'Details of {modelClass}: ', [
    'modelClass' => 'Users',
]) . $model->userName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];

?>


             <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
    
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                    <div class="card-text">
  <?= Alert::widget() ?>	
                    </div>
					

  <p>
        <?php if(yii::$app->user->identity->userID != $model->userID)
		{?>
		<?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->userID], ['class' => 'btn btn-outline-info']);?>
  <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->userID], [
            'class' => 'btn btn-outline-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]);?>
		<?=Html::a(' <i class="ft-x"></i> Back', ['index'], ['class' => 'btn btn-outline-dark']);?>
  
 <?php 
}

else


	echo  Html::a(Yii::t('app', 'Change Password'), ['changepassword', 'id' => $model->userID], ['class' => 'btn btn-outline-warning']);

?>

		</p>
  

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        'attribute' => 'active',
        'value' => function($model) {
          return app\components\CoreUtils::getStatusDescription($model->status);
			}
      ],

			 //getStatusDescription
            // 'dateActivated',
             'dateCreated',
             'dateModified',
        ],
    ]) ?>

                  </div>
                </div>
              </div>
            </div>
          </div>

		  
		  
