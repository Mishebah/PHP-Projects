<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property integer $paymentID
 * @property integer $ordersID
 * @property integer $clientID
 * @property string $transactionID
 * @property string $amount
 * @property string $MSISDN
 * @property string $receiptNumber
 * @property string $businessNumber
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property string $accountNumber
 * @property integer $updatedBy
 * @property integer $active
 * @property string $dateCreated
 * @property string $dateModified
 * @property integer $insertedBy
 *
 * @property Orders $orders
 * @property Orders $client
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ordersID', 'contentName','clientID', 'transactionID', 'amount', 'MSISDN', 'receiptNumber', 'businessNumber', 'FirstName', 'MiddleName', 'LastName', 'accountNumber'], 'required'],
            [['ordersID', 'clientID', 'MSISDN', 'updatedBy', 'insertedBy'], 'integer'],
            [['dateCreated', 'dateModified'], 'safe'],
            [['transactionID', 'contentName','receiptNumber', 'businessNumber', 'FirstName', 'MiddleName', 'LastName', 'accountNumber'], 'string', 'max' => 50],
            [['amount'], 'string', 'max' => 200],
            [['active'], 'string', 'max' => 3],
            [['ordersID'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['ordersID' => 'orderID']],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['clientID' => 'clientID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'paymentID' => 'Payment ID',
            'ordersID' => 'Orders ID',
            'clientID' => 'Client ID',
            'transactionID' => 'Transaction ID',
            'amount' => 'Amount',
            'contentName' => 'Content Name',
            'MSISDN' => 'Msisdn',
            'receiptNumber' => 'Receipt Number',
            'businessNumber' => 'Business Number',
            'FirstName' => 'First Name',
            'MiddleName' => 'Middle Name',
            'LastName' => 'Last Name',
            'accountNumber' => 'Account Number',
            'updatedBy' => 'Updated By',
            'active' => 'Active',
            'dateCreated' => 'Date Created',
            'dateModified' => 'Date Modified',
            'insertedBy' => 'Inserted By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderss()
    {
        return $this->hasOne(Orders::className(), ['orderID' => 'ordersID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Orders::className(), ['clientID' => 'clientID']);
    }
}
