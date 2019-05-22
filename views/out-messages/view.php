<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OutMessages */

$this->title = $model->messageID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Out Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="out-messages-view">

  

    <p>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->messageID], [
            'class' => 'btn btn-outline-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(' <i class="ft-x"></i> Back', ['index'], ['class' => 'btn btn-outline-dark']);?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'messageID',
           // 'clientID',
    
            //'ordersID',
       
            //'downloadID',
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
            'dateCreated',
            //'createdBy',
            //'dateModified',
            //'updatedBy',
        ],
    ]) ?>

</div>
