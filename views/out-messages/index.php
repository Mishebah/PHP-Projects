<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OutMessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Out Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="out-messages-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'messageID',
           // 'clientID',
            //'ordersID',
            //'paymentID',
            'contentName',
            // 'downloadID',
           'messageContent:ntext',
             'MSISDN',
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
            // 'createdBy',
            // 'dateModified',
            // 'updatedBy',

             [
		'class' => '\kartik\grid\ActionColumn',
    'template' => '{reset} {view}  {delete}',
    'buttons' => [
        
    ],
],
        ],
    ]); ?>
</div>
