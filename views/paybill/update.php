<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paybill */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Paybill',
]) . $model->paybillNo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paybills'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->paybillNo, 'url' => ['view', 'id' => $model->paybillNo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="paybill-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
