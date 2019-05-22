<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OutMessages */

$this->title = Yii::t('app', 'Create Out Messages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Out Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="out-messages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
