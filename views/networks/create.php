<?php

use yii\helpers\Html;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model app\models\Networks */

$this->title = 'Create Network';
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
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>  </section>