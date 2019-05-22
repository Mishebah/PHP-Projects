<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Clients */
/* @var $form yii\widgets\ActiveForm */

								
?>
<div class="row">
	<div class="col-10">
		<div class="card">
                                    <div class="card-body">
<?php $form = ActiveForm::begin(['options' => ['class' => 'form','enctype' => 'multipart/form-data']]); ?>
	                      <div class="form-body">
<?= $form->errorSummary($model,['header'=>'','class' => 'alert alert-error']) ?>

     <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Client Name</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'clientName')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                          </div>
                        </div>

    <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Postal Adress</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'postalAddress')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                          </div>
                        </div>
    <div class="form-group row">
		<label class="col-md-2 label-control" for="timesheetinput1">Physical Adress</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'physicalAddress')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                          </div>
    </div>
    <div class="form-group row">
		<label class="col-md-2 label-control" for="timesheetinput1">Phone</label>
                          <div class="col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'telephoneNo')->textInput(['type'=>"tel",'pattern'=>"[0-9]{10}", 'maxlength'=>true])->label(false) ?>
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
		 <label class="col-md-2 label-control" for="timesheetinput1">Client Description</label>
                          <div class=" col-md-7">
                            <div class="position-relative">
     <?= $form->field($model, 'clientDesc')->textarea([ 'rows'=>"6",'cols'=>"10",'maxlength' => true])->label(false) ?>
                        </div>
                          </div>
     
</div>
   <div class="modal-footer"> 
                          <?= Html::submitButton($model->isNewRecord ? 'Create Client' : 'Update Client', ['class' => $model->isNewRecord ? "btn btn-outline-dark" : 'btn btn-dark']) ?>
														

                  <?= Html::a(' <i class="ft-x"></i> Cancel', ['clients/index'], ['class' => "btn btn-outline-dark"]) ?>
						     
                      </div>
    <?php ActiveForm::end(); ?>
				</div>
																								</div>
																																				</div>
	</div>