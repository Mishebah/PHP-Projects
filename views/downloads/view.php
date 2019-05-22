<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Downloads */

$this->title = $model->downloadsID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Downloads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="downloads-view">

   

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->downloadsID], ['class' => 'btn btn-outline-dark']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->downloadsID], [
            'class' => 'btn btn-outline-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'downloadsID',
            //'orderID',
           // 'clientID',
             'contentName',
            'downloads:ntext',
            'uuid',
            //'updatedBy',
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
            //'dateModified',
            //'insertedBy',
        ],
    ]) ?>

</div>
