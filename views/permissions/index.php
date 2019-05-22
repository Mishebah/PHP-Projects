<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use common\widgets\Alert;
use yii\helpers\ArrayHelper;
use app\models\Modules;
use app\models\EntityActions;
use app\models\Groups;
use app\models\Permissions;
use yii\widgets\ActiveForm;
use app\components\StatusCodes;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PermissionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permissions';
$this->params['breadcrumbs'][] = $this->title;
?>
<header class="page-header">
						<h2><?= Html::encode($this->title) ?></h2>
					</header>	
					<section class="search-content">
 <div class="card  card-primary">
              <div class="card-content">
                <div class="card-body">

				
	  <?= Alert::widget() ?>	
		       <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
 <div class="row">
            <div class="col s3">
<?=$form->field($searchModel, 'groupID')->dropDownList(ArrayHelper::map(Groups::find()->where(['ACTIVE' =>StatusCodes::ACTIVE])->all(),'groupID','groupName'), ['prompt'=>'-Choose a Group --'])?>			
			  </div>
			            <div class="col s3">

<?=$form->field($searchModel, 'moduleID')->dropDownList(ArrayHelper::map(Modules::find()->where(['ACTIVE' =>StatusCodes::ACTIVE])->all(),'moduleID','moduleName'), ['prompt'=>'-Choose a module --'])?>
  </div> 
        <div class="col s2"><br />
          <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
            </div>

    </div>
	<?php ActiveForm::end(); ?>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Html::tag('i', '', ['class' => '"ft-plus white']) .' Set Permissions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
                  <!-- Invoices List table -->
                  <div class="table-responsive wrap">
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
			   'pager' => [
	'linkOptions' => ['class' => 'page-link'],
		'options' => ['class' => 'pagination'],
    ],
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
    [
           'label'=>'Group',
           'format' => 'raw',
       'value'=>function ($data) {
            return Html::a($data->group->groupName,['groups/view', 'id' => $data->groupID]);
        },
    ],
           // 'permissionID',
		   'group.groupName',
            'module.moduleName',
            'entityAction.actionName',
           // 'access',
     			 [
        'attribute' => 'active',
        'value' => function($model) {
          return app\components\CoreUtils::getStatusDescription($model->active);
			}
      ],
            //'insertedBy',
            //'dateCreated',
            //'updatedBy',
            'dateModified',

            ['class' => '\kartik\grid\ActionColumn',
			        'header'=>'Actions',
        'template' => '{delete}',
			],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

                    </div>
                  </div>
                </div>
              </div>
			  </section>
			  
	