<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReportAccessRules */

$this->title = $model->reportAccessRuleID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Access Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-access-rules-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->reportAccessRuleID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->reportAccessRuleID], [
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
            'reportAccessRuleID',
            'groupID',
            'reportTypeID',
            'active',
            'insertedBy',
            'dateCreated',
            'updatedBy',
            'dateModified',
        ],
    ]) ?>

</div>
