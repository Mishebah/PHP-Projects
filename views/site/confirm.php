<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use common\widgets\Alert;

$this->title = $name;
?>
 <!-- email send icon with text-->
                        <div class="text-center m-auto">
                            <img src="<?= Yii::getAlias('@web/theme') ?>/assets/images/mail_sent.svg" alt="mail sent image" height="64" />
                            <h4 class="text-dark-50 text-center mt-4 font-weight-bold"><?=$name;?></h4>
							<?= Alert::widget() ?>

                            <p class="mb-4">
                               <?=nl2br(Html::encode($message)) ?>
                            </p>
							 <p><?=Html::a('<i class="mdi mdi-home mr-1"></i> Back to Home </button>',
    ['/'],['class' => 'btn btn-primary btn-block']) ?>
	</p>
                        </div>

	
						