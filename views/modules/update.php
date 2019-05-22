<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Modules */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Modules',
]) . $model->moduleID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Modules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->moduleID, 'url' => ['view', 'id' => $model->moduleID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="modules-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
