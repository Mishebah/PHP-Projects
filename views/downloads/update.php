<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Downloads */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Downloads',
]) . $model->downloadsID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Downloads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->downloadsID, 'url' => ['view', 'id' => $model->downloadsID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="downloads-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
