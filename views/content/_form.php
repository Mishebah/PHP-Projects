<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\StatusCodes;
use yii\helpers\ArrayHelper;
use app\models\Clients;

$cond = ['ACTIVE' =>StatusCodes::ACTIVE];
								if(yii::$app->user->identity->clientID != Yii::$app->params['ADMIN_CLIENT_ID'])
									$cond['clientID'] = yii::$app->user->identity->clientID ;						
?>
<div class="row">
	<div class="col-10">
		<div class="card">
                                    <div class="card-body">
																																					
<?php $form = ActiveForm::begin(['options' => ['class' => 'form','enctype' => 'multipart/form-data']]);

									?>
	                <div class="form-body">      
<?= $form->errorSummary($model,['header'=>'','class' => 'alert alert-error']) ?>

     <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Client Name</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?=$form->field($model, 'clientID')->dropDownList(ArrayHelper::map(Clients::find()->where($cond)->all(),'clientID','clientName'),['prompt'=>'Select Client','class'=>'form-control m-input'])->label(false)?>
                        </div>
                          </div>
                        </div>

    <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Content Price</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'price')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                          </div>
                        </div>
    <div class="form-group row">
		<label class="col-md-2 label-control" for="timesheetinput1">Content Name</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'contentName')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                          </div>
    </div>
    <div class="form-group row">
		<label class="col-md-2 label-control" for="timesheetinput1">Keyword</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'keyword')->textInput(['type'=>"text", 'maxlength'=>true])->label(false) ?>
                       <span class="note"> <small>Example:KWACHUWA</small></span>
																							 </div>
                          </div>
    </div>
				<div class="form-group row">
		<label class="col-md-2 label-control" for="timesheetinput1">Short Code</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'shortCode')->textInput(['type'=>"text", 'maxlength'=>true])->label(false) ?>
                       <span class="note"> <small>Example:3020</small></span>
																							 </div>
                          </div>
    </div>
  

<div class="form-group row">
		 <label class="col-md-2 label-control" for="timesheetinput1">Content</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'contentfile')->fileInput()->label(false) ?>
                        </div>
                          </div>
</div>
 <div class="form-group row">
		 <label class="col-md-2 label-control" for="timesheetinput1">Content Description</label>
                          <div class=" col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'description')->textarea([ 'rows'=>"5",'cols'=>"5",'maxlength' => true])->label(false) ?>
                        </div>
                          </div>
     
</div>
   <div class="modal-footer"> 
                          <?= Html::submitButton($model->isNewRecord ? 'Create Content' : 'content-update', ['class' => $model->isNewRecord ? "btn btn-outline-dark" : 'btn btn-dark']) ?>
														

                  <?= Html::a(' <i class="ft-x"></i> Cancel', ['index'], ['class' => "btn btn-outline-dark"]) ?>
						     
                      </div>
    <?php ActiveForm::end(); ?>
				</div>
																								</div>
																																				</div>
	</div>