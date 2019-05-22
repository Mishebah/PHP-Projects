<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Paybill */

$this->title = Yii::t('app', 'Create Paybill');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paybills'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paybill-create">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
