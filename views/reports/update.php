<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reports */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Reports',
]) . $model->reportID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reportID, 'url' => ['view', 'id' => $model->reportID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="reports-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
