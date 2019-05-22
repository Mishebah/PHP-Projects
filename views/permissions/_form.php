<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\GroupTypes;
use app\components\StatusCodes;
use yii\helpers\ArrayHelper;
use app\models\Modules;
use app\models\EntityActions;
use app\models\Groups;
use app\models\Permissions;
/* @var $this yii\web\View */
/* @var $model app\models\Permissions */
/* @var $form yii\widgets\ActiveForm */
?>

  <?php $form = ActiveForm::begin(['options' => ['class' => 'form','enctype' => 'multipart/form-data']]); ?>
	                      <div class="form-body">
	<?php echo $form->errorSummary($model, array('errorCssClass' => 'alert alert-error')); ?>

	                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Group</label>
                          <div class="col-md-6">
                            <div class="position-relative">
  
<?=$form->field($model, 'groupID')->dropDownList(ArrayHelper::map(Groups::find()->where(['ACTIVE' =>StatusCodes::ACTIVE])->all(),'groupID','groupName'), ['prompt'=>'-Choose a Group --',
              'onchange'=>'this.form.submit()'])->label(false)?>                            </div>
                          </div>
                        </div>
							                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Modules</label>
                          <div class="col-md-6">
                            <div class="position-relative">
  

<?=$form->field($model, 'moduleID')->dropDownList(ArrayHelper::map(Modules::find()->where(['ACTIVE' =>StatusCodes::ACTIVE])->all(),'moduleID','moduleName'), ['prompt'=>'-Choose a module --',
              'onchange'=>'this.form.submit()'])->label(false)?>                            </div>
                          </div>
                        </div>
							                        <div class="form-group row">
				                          <label class="col-md-2 label-control" for="timesheetinput1">Permission</label>
                          <div class="col-md-6">
                            <div class="position-relative">
  
<?php
$data  =  ArrayHelper::map(entityActions::find()->where(['ACTIVE' =>StatusCodes::ACTIVE])->all(),'entityActionID','actionName');
//we check if the user has the assigned permissions 
//we check we have both 
if(isset($model->groupID) and isset($model->moduleID) and $model->moduleID !=null and $model->groupID !=null)
{
	$permissions  = Permissions::find()->select('entityActionID')->where(['ACTIVE' =>StatusCodes::ACTIVE,'moduleID'=>$model->moduleID,'groupID'=>$model->groupID])->asArray()->all();
	//print_r($permissions);

	$model->entityActionID= array_column($permissions, 'entityActionID');
	//we have the group and module we now check for existing permissions  
echo $form->field(
                $model,
                'entityActionID')
             ->checkBoxList( $data,
                array(
                    'template'=>'{input}{label}',
                    'separator'=>' ',
					      'item' => function($index, $label, $name, $checked, $value) {
            return "<div class='form-check'><input type='checkbox' {$checked} name='{$name}' value='{$value}'><label class='form-check-label'>{$label}</label></div>";
        }             )                            
            )->label(false);
}
else
{
	                    echo "Select a module and group first";

}
?>                            </div>
                          </div>
                        </div>
				                        
						
	                       

                      <div class="form-actions center">
                          <?= Html::submitButton('Save Permission', ['name'=>'save','class' => 'btn btn-primary']) ?>

                  <?= Html::a(' <i class="ft-x"></i> Cancel', ['index'], ['class' => 'btn btn-warning mr-1']) ?>
						     
                      </div>
</div>
    <?php ActiveForm::end(); ?>



