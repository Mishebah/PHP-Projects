<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\ButtonDropdown;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<header class="page-header">
						<h2><?= Html::encode($this->title) ?></h2>
					</header>	
					<section class="search-content">
 <div class="card  card-primary">
              <div class="card-content">
                <div class="card-body">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= Html::a(Yii::t('app', 'Create Group'), ['create'], ['class' => 'btn btn-success']) ?>
   <p></p>
                  <!-- Invoices List table -->
                  <div class="table-responsive wrap">
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'groupID',
            'groupType.groupTypeName',
            'groupName',
            'description',
			 [
        'attribute' => 'active',
        'value' => function($model) {
          return app\components\CoreUtils::getStatusDescription($model->active);
			}
      ],
       'dateCreated',
            // 'insertedBy',
            // 'dateModified',
            // 'updatedBy',
  ['class' => '\kartik\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

                    </div>
                  </div>
                </div>
              </div>
			  
   </section>
