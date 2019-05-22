<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Content'), ['create'], ['class' => 'btn btn-outline-secondary']) ?>
    </p>
 
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'contentID',
            'client.clientName',
            'keyword',
            'contentName:ntext',
            'originalFileName',
           'generatedFileName',
           
             
             'price',
          
            // 'updatedBy',
              [
            'label'=>'Status',
            'format'=>'raw',
            'value' => function($model){
              $value = "Pending";
			  switch ($model->active)
			  {
				  case 1 :
				  $value ="Active";
				  break;
				  case 2:
				  $value = "Created";
				  break;
				  case 3:
				  $value ="Stopped";
				  break;
			  }
			  return $value;
            }
        ],
            // 'dateCreated',
            // 'dateModified',
            // 'insertedBy',
 [
		'class' => '\kartik\grid\ActionColumn',
    'template' => '{view} {update}  {delete}',
    'buttons' => [
        
    ],
],
        ],
    ]);
 ?>

</div>
