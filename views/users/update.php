<?php

use yii\helpers\Html;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Users',
]) . $model->userName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userName, 'url' => ['view', 'id' => $model->userID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>	
					<section class="call-to-action call-to-action-top mb-4">
          <div class="row">
            <div class="col-md-12">
              <div class="card  card-primary">
               
                <div class="card-content collpase show">
                  <div class="card-body">
                    <div class="card-text">
  <?= Alert::widget() ?>	
                    </div>

    <?= $this->render('_form', [
         'model' => $model,'userGroups'=>$userGroups,
    ]) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>  </section>

