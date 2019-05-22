<?php
use app\models\Groups;
use app\models\Clients;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\StatusCodes;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
$cond = ['ACTIVE' =>StatusCodes::ACTIVE];
								if(yii::$app->user->identity->clientID != Yii::$app->params['ADMIN_CLIENT_ID'])
									$cond['clientID'] = yii::$app->user->identity->clientID ;
								
?>
<div class="row">
	<div class="col-10">
		<div class="card">
  <div class="card-body">
<?php $form = ActiveForm::begin(['options' => ['class' => 'form','enctype' => 'multipart/form-data']]); ?>
	                      <div class="form-body">
<?= $form->errorSummary($model,['header'=>'','class' => 'alert alert-error']) ?>
<?= $form->errorSummary($userGroups,['header'=>'','class' => 'alert alert-error']) ?>
	                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Client</label>
                          <div class="col-md-7">
                            <div class="position-relative">
  
<?=$form->field($model, 'clientID')->dropDownList(ArrayHelper::map(Clients::find()->where($cond)->all(),'clientID','clientName'),['prompt'=>'Select Client','class'=>'form-control m-input'])->label(false)?>                            </div>
                          </div>
																										   </div>
                       
							                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">User Name</label>
                          <div class="col-md-7">
                            <div class="position-relative">
  
 <?= $form->field($model, 'userName')->textInput(['maxlength' => true])->label(false) ?>
	</div>
                          </div>
                        </div>
							                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Full Names</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'fullNames')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                          </div>
                        </div>
								                       
																																
																																<div class="form-group row">
		<label class="col-md-2 label-control" for="timesheetinput1">Mobile Number</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'MSISDN')->textInput(['type'=>"tel",'pattern'=>"[0-9]{10}", 'maxlength' => true])->label(false) ?>
                       <span class="note">Format: 1234567890</span>
																							 </div>
                          </div>
    </div>
  

<div class="form-group row">
		 <label class="col-md-2 label-control" for="timesheetinput1">Email Adress</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'emailAddress')->textInput(['type'=>"email",'pattern'=>"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$",'maxlength' => true])->label(false) ?>
                        </div>
                          </div>
</div>
		
								                  
 <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1"> Password</label>
                          <div class="col-md-7">
                            <div class="position-relative">
 <?= $form->field($model, 'password')->passwordInput(['title'=>'Please enter you password', 'placeholder'=>'Password','autocomplete'=>'off', 'class' => 'form-control'])->label(false)  ?>
                        </div>
                          </div>
                        </div>
																									
									                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Group</label>
                          <div class="col-md-7">
                            <div class="position-relative">
	        <?=$form->field($userGroups, 'groupID')->dropDownList(ArrayHelper::map(Groups::find()->where(['ACTIVE' =>StatusCodes::ACTIVE])->all(),'groupID','groupName'),['prompt'=>'Select Group'])->label(false)?>
                        </div>
                          </div>
                        </div>						
	                       

                        <div class="modal-footer">
                          <?= Html::submitButton($model->isNewRecord ? 'Create User' : 'Update User', ['class' => $model->isNewRecord ? 'btn btn-outline-dark' : 'btn btn-outline-dark']) ?>
														

                  <?= Html::a(' <i class="ft-x"></i> Cancel', ['index'], ['class' => 'btn btn-outline-dark']) ?>
						     
                      </div>
</div>
    <?php ActiveForm::end(); ?>
</div>
                          </div>
                        </div>
	  </div>



	
	