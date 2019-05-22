<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clients */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Clients',
]) . $model->clientName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->clientID, 'url' => ['view', 'id' => $model->clientID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="clients-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
