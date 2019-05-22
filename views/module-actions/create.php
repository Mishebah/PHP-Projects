<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ModuleActions */

$this->title = Yii::t('app', 'Create Module Actions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Module Actions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-actions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
