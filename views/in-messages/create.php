<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InMessages */

$this->title = Yii::t('app', 'Create In Messages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'In Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="in-messages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
