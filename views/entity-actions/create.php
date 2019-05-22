<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EntityActions */

$this->title = Yii::t('app', 'Create Entity Actions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entity Actions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entity-actions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
