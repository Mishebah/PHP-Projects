<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\widgets\Alert;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\Groups */

$this->title = $model->groupName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<header class="page-header">
						<h2><?= Html::encode($this->title) ?></h2>
					</header>	
					<section class="call-to-action call-to-action-top mb-4">
 <div class="row">
            <div class="col-md-12">
              <div class="card  card-primary">
                <div class="card-header">
     <h2 class="card-title"><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                    <div class="card-text">
  <?= Alert::widget() ?>	
                    </div>	

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->groupID], ['class' => 'btn btn-primary']) ?>
		<?= Html::a(Yii::t('app', 'Add Group Permissions'), ['permissions/create', 'id' => $model->groupID], ['class' => 'btn btn-primary']) ?>

        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->groupID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
						 <?= Html::a('All Groups', ['index'], ['class' => 'btn btn-warning mr-1']) ?>

    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'groupID',
            //'groupTypeID',
            'groupName',
            'description',
 [
        'attribute' => 'active',
        'value' => function($model) {
          return app\components\CoreUtils::getStatusDescription($model->active);
			}
      ],
      
            'dateCreated',
          //  'insertedBy',
       //     'dateModified',
         //   'updatedBy',
        ],
    ]) ?>

</div>
<div class=" col-md-12  card-body card-featured card-featured-primary">
    <h1>Permissions </h1>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      // 'ID',MSISDN, contactName,dateCreated
        'module.moduleName',
		'entityAction.actionName',
        'dateModified',
    ],
]); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  </section>
