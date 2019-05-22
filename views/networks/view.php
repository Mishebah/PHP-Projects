<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Networks */

$this->title = $model->networkName;
$this->params['breadcrumbs'][] = ['label' => 'Networks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<header class="page-header">
						<h2><?= Html::encode($this->title) ?></h2>
					</header>	
					<section class="call-to-action call-to-action-top mb-4">


             <div class="row">
            <div class="col-md-12">
              <div class="card  card-primary">
                <div class="card-header">
   <h2 class="card-title"><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                    <div class="card-text">
  <?= Alert::widget() ?>	
                    </div>	

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->networkID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->networkID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
						 <?= Html::a('All Networks', ['index'], ['class' => 'btn btn-warning mr-1']) ?>

    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'networkName',
            'prefix',
            'numberLength',
            'prefixLength',
            'networkFullName',
            'proxyUrl',
			[
        'attribute' => 'active',
        'value' => function($model) {
          return app\components\CoreUtils::getStatusDescription($model->active);
			}
      ],
        ],
    ]) ?>

                  </div>
                </div>
              </div>
            </div>
          </div>

		  </section>
		  