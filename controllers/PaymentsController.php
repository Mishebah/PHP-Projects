<?php

namespace app\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\HttpException;
use yii\db\Expression;
use yii\helpers\Json;
use app\models\Payments;
use app\models\Content;
use app\models\Orders;
use app\models\OutMessages;
use app\models\Downloads;
use app\components\CoreUtils;

use yii\rest\ActiveController;
class PaymentsController extends ActiveController
{
	
	
    public $modelClass = 'app\models\Payments';

public function actionValidation()
{
$model= new Payments();
//http://dev.secudesk.co.ke/lotto/api/services/inbox
 //\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
 
$post =Yii::$app->request->getRawBody();
Yii::warning('SMS REQUEST '.$post, __METHOD__);
 $data =json_decode($post,true);
// $postData =  file_get_contents('php://input');
	
if(!is_array($data))

{
          throw new HttpException(500,"Invalid Request");
}
         else{
          $content = Orders::find()
        ->where(['name' =>$data['BillRefNumber']])
        ->one();
        if ($content == null)
        {
       print_r( $content->getErrors());
Yii::$app->response->statusCode = 401;
echo json_encode(['status' => 401]);
exit();
        }
        else
       
      {
      
     $model->ordersID = $content->orderID;
    $model->clientID = $content->clientID;
    $model->transactionID = $data['TransID'];
     $model->contentName = $data['BillRefNumber'];
			$model->receiptNumber= $data['TransTime'];
			$model->amount= $data['TransAmount'];
		$model->businessNumber= $data['BusinessShortCode'];
  $model->FirstName = $data['FirstName'];
  $model->MiddleName = $data['MiddleName'];
  $model->LastName = $data['LastName'];
   $model->accountNumber= $data['TransactionType'];
			$model->MSISDN= $data['MSISDN'];
   $model->active  ='1';
				$model->updatedBy =  $data['MSISDN']; 
     $model->insertedBy =  $data['MSISDN'];
			$model->dateCreated= new Expression('NOW()');
		//	$status = "Failed";
        
         
         
         
          
   if($model->validate() && $model->save())
   
        
{
 
$content = Content::find()
        ->where(['keyword' =>$model->contentName])
        ->one();
 
if ($content == null)
        {
         
         print_r($content->getErrors());
         }
elseif ($model->contentName == $content->keyword)
       
    {
     $downloads = new Downloads;
     $outmessages = new OutMessages;
      $uuid=CoreUtils::uniqidReal();
      
      //save to download table
      $downloads->orderID = $model->ordersID;
    $downloads->clientID = $model->clientID;
    $downloads->contentName  = $model->contentName ;
    $downloads->MSISDN  = $model->MSISDN ;
     $downloads->uuid =$uuid;
     	$downloads->dateCreated= new Expression('NOW()');
     $downloads->active  ='1';
			  $downloads->downloads  = "http://localhost/d/".$uuid;
    $downloads->updatedBy =  $model->updatedBy; 
     $downloads->insertedBy =  $model->insertedBy;
     
     //save to outmasseges
    
     
     
     
     
      if($downloads->validate() && $downloads->save())
         
        
   $outmessages->ordersID = $downloads->orderID;
    $outmessages->clientID = $downloads->clientID;
    $outmessages->paymentID = $model->paymentID;
   $outmessages->downloadID  = $downloads->downloadsID;
    $outmessages->contentName  = $downloads->contentName ;
    $outmessages->messageContent   = "Dear Customer, to download :". $downloads->contentName." Content,click on this link here:"." http://localhost/d/".$downloads->uuid.".Thank You".".";
    $outmessages->MSISDN  = $downloads->MSISDN ;
    	$outmessages->dateCreated= new Expression('NOW()');
     $outmessages->active  ='1';
     $outmessages->updatedBy =  $downloads->updatedBy; 
     $outmessages->createdBy =  $content->clientID;
         
       if  ($outmessages->validate() && $outmessages->save())
      {
    echo '{"ResultCode": 0, "ResultDesc": "The service was accepted successfully", "ThirdPartyTransID": "1234567890"}';     
}

}

	//Dear Customer to download content *content name click on the link (http://d/uuid)

}

else
{
 print_r($model->getErrors());
 
          //throw new HttpException(502,"Invalid Request");
									die();
}					
	}}		}		}
