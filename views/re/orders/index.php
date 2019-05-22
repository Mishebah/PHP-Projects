<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'orderID',
           // 'clientID',
          'client.clientName',
           // 'messageID',
           // 'payerNarration',
            'MSISDN',
             'name:ntext',
            'active',
            'dateCreated',
            // 'dateModified',
            // 'insertedBy',
            // 'updatedBy',
            // 'checkoutRequestID',
            // 'recieptNumber',

            [
		'class' => '\kartik\grid\ActionColumn',
    'template' => '{view} {update}  {delete}',
    'buttons' => [
        
    ],
],
        ],
    ]); ?>
</div>
