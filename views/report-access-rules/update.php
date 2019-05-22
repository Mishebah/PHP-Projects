<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportAccessRules */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Report Access Rules',
]) . $model->reportAccessRuleID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Access Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reportAccessRuleID, 'url' => ['view', 'id' => $model->reportAccessRuleID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="report-access-rules-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
