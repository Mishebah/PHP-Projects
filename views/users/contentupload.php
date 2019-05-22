<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $model common\models\Campaign */

$this->title = Yii::t('app', 'Content');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'user'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

        

        <div class="row">
			<div class="col-sm-12">
											<div class="card">
                                    <div class="card-body">

           
												<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data',
												 'id' => 'create-customm-form',
												 'enableAjaxValidation' => true,
												 'options' => [
													  'class'=>'m-form',
														]]]); 
												       echo   $form->field($model, 'clientID')->hiddenInput()->label(false);
                                                        ?>
                                                        <?php echo $form->errorSummary($model, array('errorCssClass' => 'alert alert-error col-lg-12')); ?>
             		
             <?= $form->field($model, 'contentupload')->fileInput() ?>
             <div class="form-group mb-4 col-sm-5">
                
          <?= $form->field($model, 'price')->textInput(['autofocus' => true]) ?>
         
												<span class="help-block"><small>Example ksh 200.</small></span><br><br>

 </div>
                                                    <div class="modal-footer">                                                       
                                                         <?= Html::submitButton($model->isNewRecord ? 'Upload' : 'Update Content', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-success']) ?>
														 <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                    </div>
													
														<?php ActiveForm::end(); ?>
														</div>
									</div>
											</div>
														
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
</div>
  