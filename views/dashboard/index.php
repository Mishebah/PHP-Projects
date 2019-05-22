use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\ButtonDropdown;
use common\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Clients;
use app\components\StatusCodes;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PaybillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$cond = ['ACTIVE' =>StatusCodes::ACTIVE];
	if(yii::$app->user->identity->clientID !== Yii::$app->params['ADMIN_CLIENT_ID'])
	$cond['clientID'] = yii::$app->user->identity->clientID ;

$this->title = Yii::t('app', 'Paybills');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paybill-index">

     <?= Alert::widget() ?>	
		       <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
 <div class="row">
     
  <div class="col s3">
	<?= $form->field($searchModel, 'paybillNo')->textInput(['autofocus' => true,'title'=>'Enter Paybill ',  'placeholder'=>'Enter Paybill']) ?>

	            </div>
            <div class="col s3">
	        <?=$form->field($searchModel, 'clientID')->dropDownList(ArrayHelper::map(Clients::find()->where($cond)->all(),'clientID','clientName'),['prompt'=>'Select Client'])?>	            </div>
        <div class="col s2">
		<br />
          <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-outline-info']) ?>
            </div>

    </div>
	<?php ActiveForm::end(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Paybill'), ['create'], ['class' => 'btn btn-outline-dark']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'paybillNo',
												'client.clientName',
												'clientID',
            'passKey',
            'consumerKey',
            'consumerSecret',
            'active',
            // 'dateActivated',
            // 'insertedBy',
            // 'dateCreated',
            // 'updatedBy',
            // 'dateModified',

            [
		'class' => '\kartik\grid\ActionColumn',
    'template' => '{view} {update}  {delete}',
    'buttons' => [
        
    ],
],
        ],
    ]); ?>
</div>
