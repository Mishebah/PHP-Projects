<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>
<div class="row">
 <div class="col-lg-8">
    
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
<div class="row">
        <div class="col-lg-6">
                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
</div>
 <div class="col-lg-6">
                <?= $form->field($model, 'email') ?>
</div>
</div>
<div class="row">
 <div class="col-lg-12">
                <?= $form->field($model, 'subject') ?>
</div>
</div>
<div class="row">
<div class="col-lg-12">
                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
</div>
</div>
<div class="row">
<div class="col-lg-12">

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
</div>
</div>
<div class="row">
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
</div>  
            <?php ActiveForm::end(); ?>
     </div>  
     <div class="col-lg-4">
<section>
 <div class="col-sm-12" data-aos="fade-up">
                      <h4>Contact</h4>
                      <address>
                        Adak House<br>
                        Nairobi<br>
                        <abbr title="Phone">P:</abbr> (254) 456-7890<br/>
                        E: <a href="mailto:contact@smsbird.com">contact@smsbird.com</a>
                      </address>
                    </div>
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed/v1/place?q=Adak+House&key=AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="width: 100%; height: 360px;"></iframe>
                </div>
            </section>
</div>
</div>
</div>