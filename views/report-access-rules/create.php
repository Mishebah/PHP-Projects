<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReportAccessRules */

$this->title = Yii::t('app', 'Create Report Access Rules');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Access Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-access-rules-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
