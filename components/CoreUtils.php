<?php
namespace app\components;
  
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

use yii\db\Expression;
use yii\helpers\Json;
use yii\httpclient\Client;
use app\components\StatusCodes;
use app\models\UserPasswordRequest;
use app\models\Users;
use app\models\CreditAllocation;
use app\models\CreditConsumption;

class CoreUtils
{
 public function generatePIN($digits =4)
 {
      $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
 }
 public function getStatusDescription($status)
 {
	 if(array_key_exists($status,StatusCodes::ENTITY_STATES))
	  return StatusCodes::ENTITY_STATES[$status];
	else
		return 'NULL';
 }
 
 function uniqidReal($lenght = 13) {
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}
    public static function createUserPasswordRequest($email) {
        //first check if there are other password requests for this email address, if so
        //expire them
	
			 $userPasswordRequest = new UserPasswordRequest();
       			UserPasswordRequest::updateAll(array( 'active' => 0 ), 'email=:email',array(':email' => $email));

        $ip = $_SERVER['REMOTE_ADDR']; //IP address
        $pwdReq = new UserPasswordRequest();
        $pwdReq->email = $email;
        $pwdReq->token =  Yii::$app->security->generateRandomString() . '_' . time();;
        $pwdReq->IP = $ip;
        $pwdReq->active = 1;
        $pwdReq->dateCreated = new Expression('NOW()');
        if ($pwdReq->save()) {
            return $pwdReq->requestID;
        } else {
				Yii::app()->user->setFlash('error', "Error Experienced saving transactions".$e->getMessage());

            return NULL;
        }

    }
public function getClientCredit()
{
$creditAllocated = CreditAllocation::find()->where(['creditStatusID' =>StatusCodes::ACTIVE,'clientID'=>yii::$app->user->identity->clientID])->sum("creditsAllocated");
$creditConsumed  = CreditConsumption::find()->where(['creditStatusID' =>StatusCodes::ACTIVE,'clientID'=>yii::$app->user->identity->clientID])->sum("creditsConsumed");
return number_format($creditAllocated  - $creditConsumed);

}
public function formatMessage($search, $replace){
	try{
    preg_match_all("/\{(.+?)\}/", $search, $matches);
    if (isset($matches[1]) && count($matches[1]) > 0){
        foreach ($matches[1] as $key => $value) {
            if (array_key_exists($value, $replace)){
                $search = preg_replace("/\{$value\}/", $replace[$value], $search);
            }
        }
    }
	}
	catch (Exception $e) {
   return $search;
}

    return $search;
}

	    public  function isValidMobileNo($msisdn)
   {

       //get the country dial code
       $dialCode = '254';//Yii::app()->params['DEFAULT_COUNTRY_DIAL_CODE'];
       $msisdnLength = 12; //Yii::app()->params['DEFAULT_COUNTRY_MSISDN_LENGTH'];
       //if the first number is 0
       if (substr($msisdn, 0, 1) == '+' and  strlen($msisdn)==13) {
           $msisdn = substr($msisdn, 1);
       }

       //if the first number is 0, add default dial code
       if (substr($msisdn, 0, 1) == 0 and  strlen($msisdn)==10) {
           $msisdn = $dialCode . substr($msisdn, 1);
       }
       if (substr($msisdn, 0, 1) == 7 and strlen($msisdn)==9 ) {
           $msisdn = $dialCode.$msisdn;
       }

       //if the dialcode matches the default one & its the expected length
       if (substr($msisdn, 0, strlen($dialCode)) == $dialCode &&
           strlen($msisdn) == $msisdnLength) {
           return $msisdn;
       }
       return false;
   }
   	
   
}
