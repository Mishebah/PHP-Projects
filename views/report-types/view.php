<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReportTypes */

$this->title = $model->reportTypeID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-types-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->reportTypeID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->reportTypeID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'reportTypeID',
            'reportTypeName',
            'description:ntext',
            'active',
            'dateCreated',
            'insertedBy',
            'dateModified',
            'updatedBy',
        ],
    ]) ?>

</div>
