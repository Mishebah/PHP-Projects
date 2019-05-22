<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleActions */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Module Actions',
]) . $model->moduleActionID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Module Actions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->moduleActionID, 'url' => ['view', 'id' => $model->moduleActionID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="module-actions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
