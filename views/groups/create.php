<?php

use yii\helpers\Html;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model app\models\Groups */

$this->title = Yii::t('app', 'Create Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<header class="page-header">
						<h2><?= Html::encode($this->title) ?></h2>
					</header>	
					<section class="call-to-action call-to-action-top mb-4">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
     <h2 class="card-title"><?= Html::encode($this->title) ?></h2>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                    <div class="card-text">
  <?= Alert::widget() ?>	
                    </div>
					
					

    	

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  		   </section>
