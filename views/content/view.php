<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Content */

$this->title = $model->contentID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-view">



    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->contentID], ['class' => 'btn btn-outline-secondary']) ?>
       
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->contentID], [
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
           // 'contentID',
            'client.clientName',
            'keyword',
         'contentName:ntext',
            'originalFileName',
           'generatedFileName',
            'price',
            'updatedBy',
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
           //'dateCreated',
           // 'dateModified',
            //'insertedBy',
        ],
    ]) ?>

</div>
