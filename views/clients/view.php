<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clients */

$this->title = Yii::t('app', 'Details of {modelClass}: ', [
    'modelClass' => 'Clients',
]) . $model->clientName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-view">

   

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->clientID], ['class' => 'btn btn-outline-info']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->clientID], [
            'class' => 'btn btn-outline-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])?>
        <?= Html::a(' <i class="ft-x"></i> Back', ['index'], ['class' => 'btn btn-outline-dark']);?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'clientID',
            'uuid',
            'clientName',
            'clientDesc',
            'telephoneNo',
            'postalAddress',
            'physicalAddress',
            'emailAddress:email',
            'active',
            'activityHistory:ntext',
            'insertedBy',
            'dateCreated',
            'updatedBy',
            'dateModified',
        ],
    ]) ?>

</div>
