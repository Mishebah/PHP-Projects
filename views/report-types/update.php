<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportTypes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Report Types',
]) . $model->reportTypeID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reportTypeID, 'url' => ['view', 'id' => $model->reportTypeID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="report-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
