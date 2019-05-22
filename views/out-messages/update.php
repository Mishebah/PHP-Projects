<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OutMessages */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Out Messages',
]) . $model->messageID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Out Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->messageID, 'url' => ['view', 'id' => $model->messageID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="out-messages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
