<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Networks */
/* @var $form yii\widgets\ActiveForm */
?>


 <?php $form = ActiveForm::begin(['options' => ['class' => 'form','enctype' => 'multipart/form-data']]); ?>
	                      <div class="form-body">
	<?php echo $form->errorSummary($model, array('errorCssClass' => 'alert alert-error')); ?>

	                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Network Name </label>
                          <div class="col-md-6">
                            <div class="position-relative">  
    <?= $form->field($model, 'networkName')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                          </div>
                        </div>
	                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Prefix</label>
                          <div class="col-md-6">
                            <div class="position-relative">  
							<?= $form->field($model, 'prefix')->textInput()->label(false) ?>
                            </div>
                          </div>
                        </div>
 	                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">number Length</label>
                          <div class="col-md-6">
                            <div class="position-relative">  
    <?= $form->field($model, 'numberLength')->textInput()->label(false) ?>
                            </div>
                          </div>
                        </div>

						 	                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Max  Length</label>
                          <div class="col-md-6">
                            <div class="position-relative">  
    <?= $form->field($model, 'networkFullName')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                          </div>
                        </div>
						
						 	                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Sending URL</label>
                          <div class="col-md-6">
                            <div class="position-relative">  
    <?= $form->field($model, 'proxyUrl')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                          </div>
                        </div>
						
						
                         <div class="form-actions center">
                          <?= Html::submitButton('Set Network', ['class' => 'btn btn-primary']) ?>

                  <?= Html::a(' <i class="ft-x"></i> Cancel', ['index'], ['class' => 'btn btn-warning mr-1']) ?>
						     
                      </div>
</div>
    <?php ActiveForm::end(); ?>
	
	