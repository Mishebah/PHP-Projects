<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clients');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Client'), ['create'], ['class' => "btn btn-outline-secondary"]) ?>
    </p>
     <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
	'linkOptions' => ['class' => 'page-link'],
		'options' => ['class' => 'pagination'],
    ],
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'clientID',
            //'uuid',
            'clientName',
            'clientDesc',
            'telephoneNo',
         
            [
        'attribute' => 'active',
        'value' => function($model) {
          return app\components\CoreUtils::getStatusDescription($model->active);
			}
      ],
            // 'postalAddress',
            // 'physicalAddress',
            // 'emailAddress:email',
            // 'active',
            // 'activityHistory:ntext',
            // 'insertedBy',
            // 'dateCreated',
            // 'updatedBy',
            // 'dateModified',

            [
		'class' => '\kartik\grid\ActionColumn',
    'template' => '{view} {update} {delete}',
    'buttons' => [
        
    ],
],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
