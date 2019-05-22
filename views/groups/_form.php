<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\GroupTypes;
use app\components\StatusCodes;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Groups */
/* @var $form yii\widgets\ActiveForm */
?>
 <?php $form = ActiveForm::begin(['options' => ['class' => 'form','enctype' => 'multipart/form-data']]); ?>
	                      <div class="form-body">
	<?php echo $form->errorSummary($model, array('errorCssClass' => 'alert alert-error')); ?>

	                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Group </label>
                          <div class="col-md-6">
                            <div class="position-relative">  
    <?= $form->field($model, 'groupName')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                          </div>
                        </div>
	                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Description</label>
                          <div class="col-md-6">
                            <div class="position-relative">  
    <?= $form->field($model, 'description')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                          </div>
                        </div>
 	                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Group Type</label>
                          <div class="col-md-6">
                            <div class="position-relative">  
	 	<?=$form->field($model, 'groupTypeID')->dropDownList(ArrayHelper::map(GroupTypes::find()->where(['ACTIVE' =>StatusCodes::ACTIVE])->all(),'groupTypeID','groupTypeName'))?>
                            </div>
                          </div>
                        </div>

                         <div class="form-actions center">
                          <?= Html::submitButton('Save Group', ['class' => 'btn btn-primary']) ?>

                  <?= Html::a(' <i class="ft-x"></i> Cancel', ['index'], ['class' => 'btn btn-warning mr-1']) ?>
						     
                      </div>
</div>
    <?php ActiveForm::end(); ?>

