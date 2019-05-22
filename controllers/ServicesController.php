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
use app\models\InMessages;
use app\models\Content;
use app\models\Orders;
use app\components\StatusCodes;

use yii\rest\ActiveController;
class ServicesController extends ActiveController
{
	    private $account_num;
	   private $paybill;
    public $modelClass = 'app\models\InMessages';

  
    public function actionInbox()
    {
	$model = new InMessages();

$post =Yii::$app->request->getRawBody(); 
Yii::warning('SMS REQUEST '.$post, __METHOD__);

$data =json_decode($post,true);


$identify_client =  Content::find()
        ->where(['keyword' => $data['MESSAGE']])
        ->one();

if(!is_array($data))
          throw new HttpException(500,"Invalid Request");
  $this->paybill= @$data['MESSAGE'] ;
		$this->account_num= @$data['MSISDN'] ;
		
		
 $model->MSISDN = @$data['MSISDN'] + 0;
$model->clientID = $identify_client->clientID;
$model->messageContent = @$data['MESSAGE'] ;
$model->shortCode = @$data['SHORTCODE'] ;
//$model->active = @$data['STATUS'] ;
//$inboxRoute-> = str_replace("soma","",$inboxRoute->);
//$model->linkID  = @$data['link_id'] ;


$model->updatedBy =  @$data['MSISDN'];
$model->createdBy =  @$data['MSISDN'];


$model->dateCreated = new Expression('NOW()');

//      if($inboxRoute->save())
if($model->validate() && $model->save())
{
 
$content = Content::find()
        ->where(['keyword' => $model->messageContent])
        ->one();
        
        if ($content == null)
        {
       print_r( $model->getErrors());
Yii::$app->response->statusCode = 401;
echo json_encode(['status' => 401]);
exit();
        }
        else
      {  
        
   $orders = new Orders();
    $orders->clientID = $content->clientID;
				$orders->contentID = $content->contentID;
    $orders->messageID = $model->messageID;
    $orders->MSISDN = @$data['MSISDN'];
    $orders->name = @$data['MESSAGE'];
				 $orders->active  ='1';
		
     $orders->insertedBy = $model->createdBy;
    $orders->dateCreated = new Expression('NOW()');
   if ( $orders->save())
   {
    $this->Checkout();

   }
   else {
    print_r($model->getErrors());
   }
      }
        
        
      
}
else
{
	print_r( $model->getErrors());
Yii::$app->response->statusCode = 401;
echo json_encode(['status' => 200]);
exit();
}

    }
    
    	 private function Checkout()
{




$mpesa=[
'MPESA_STK_URL' =>"https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest",
'MPESA_CREDENTIALS_URL' =>"https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials",
    'PASS_KEY'  =>"aebebe5836332adbed9d4aba2397568de1f05acbd2d25b7b38d83a9fbda086c1",
    'CONSUMER_KEY' =>"6G25jC7spDrwev7ajslXfN6H0FJpwlSQ",
     'CONSUMER_SECRET' =>"rsV5GSSnIufaqwgC",
    'MPESA_PAYBILL' => "176100",
     'MPESA_CALLBACK_URL' => "http://188.166.96.83:8089/bo/index.php/payments/validation",
];
  $token = $this->getMpesaAccessToken($mpesa);
if(empty($token) or !array_key_exists("access_token",$token) or is_null($token) ):
echo json_encode(['success' => false, 'message' => 'Please Try Again',]);
else:
  $timestamp = date("YmdHis");
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $mpesa['MPESA_STK_URL']);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$token['access_token'])); 
$curl_post_data =[

  'BusinessShortCode' => $mpesa['MPESA_PAYBILL'],
  'Password' =>base64_encode($mpesa['MPESA_PAYBILL'].$mpesa['PASS_KEY'].$timestamp),
  'Timestamp' =>$timestamp,
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' =>  10,
  'PartyA' => $this-> account_num,
  'PartyB' =>  $mpesa['MPESA_PAYBILL'],
  'PhoneNumber' => $this-> account_num,
  'CallBackURL' => $mpesa['MPESA_CALLBACK_URL'],
  'AccountReference' => $this-> paybill,
  'TransactionDesc' => $mpesa['MPESA_PAYBILL']."_12"
  //create deposit request here
];
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
$curl_response = curl_exec($curl);
echo $curl_response;

if (curl_errno($curl) != 0) :
echo json_encode(['success' => false, 'message' => 'Please Try Agaddin'.curl_error($curl),]);
curl_close($curl);
exit;
endif;


//echo  json_encode(['success' => false, 'message' => 'Please Try A no toekngain']);
endif;

}



 private function getMpesaAccessToken($params) {

  if(!isset($params))
  return null;
 
        $encodedCredentials = base64_encode($params['CONSUMER_KEY'] . ":" . $params['CONSUMER_SECRET'] );
        $apiUrl =$params['MPESA_CREDENTIALS_URL'];
        try {    
    $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$encodedCredentials)); //setting a custom header
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);
if ($result === FALSE) {
echo "try again";
                  return null;
}

            if (curl_errno($ch) != 0) {

curl_close($ch);
return null;
            } else {
curl_close($ch);
               return json_decode($result,true);

            }

        } catch (Exception $e) {
echo $e->getMessage();
            //return $result = json_encode($responseArray);
        }

    }
    

    public function actionIndex()
    {
      throw new HttpException(500,"Invalid Request ");
    }
    
    
    
    
    

    }
