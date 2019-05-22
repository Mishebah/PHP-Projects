<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InMessages */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'In Messages',
]) . $model->messageID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'In Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->messageID, 'url' => ['view', 'id' => $model->messageID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="in-messages-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
