<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntityActions */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Entity Actions',
]) . $model->entityActionID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entity Actions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->entityActionID, 'url' => ['view', 'id' => $model->entityActionID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="entity-actions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
