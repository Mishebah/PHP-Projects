<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InboxRoute */

$this->title = $model->inboxID;
$this->params['breadcrumbs'][] = ['label' => 'Inbox Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inbox-route-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->inboxID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->inboxID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'inboxID',
            'SOURCEADDR',
            'DESTADDR',
            'NETID',
            'ORIGIN',
            'UDH',
            'MESSAGE',
            'status',
            'processed',
            'numberOfSends',
            'remoteID',
            'updatedTime',
            'dateCreated',
        ],
    ]) ?>

</div>
