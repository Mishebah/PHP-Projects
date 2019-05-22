<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $orderID
 * @property integer $clientID
 * @property integer $MSISDN
 * @property integer $contentID
 * @property integer $messageID
 * @property string $payerNarration
 * @property string $name
 * @property string $checkoutRequestID
 * @property string $recieptNumber
 * @property integer $active
 * @property string $dateCreated
 * @property string $dateModified
 * @property integer $insertedBy
 * @property integer $updatedBy
 *
 * @property Clients $client
 * @property Content $content
 * @property InMessages $message
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientID', 'MSISDN', 'contentID', 'messageID', 'active', 'insertedBy', 'updatedBy'], 'integer'],
            [['MSISDN', 'contentID', 'messageID',  'name',  'dateCreated'], 'required'],
            [['dateCreated', 'dateModified'], 'safe'],
            [['payerNarration', 'name', 'checkoutRequestID', 'recieptNumber'], 'string', 'max' => 50],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientID' => 'clientID']],
            [['contentID'], 'exist', 'skipOnError' => true, 'targetClass' => Content::className(), 'targetAttribute' => ['contentID' => 'contentID']],
            [['messageID'], 'exist', 'skipOnError' => true, 'targetClass' => InMessages::className(), 'targetAttribute' => ['messageID' => 'messageID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orderID' => 'Order ID',
            'clientID' => 'Client ID',
            'MSISDN' => 'Tel',
            'contentID' => 'Content ID',
            'messageID' => 'Message ID',
            'payerNarration' => 'Payer Narration',
            'name' => 'Content Name',
            'checkoutRequestID' => 'Checkout Request ID',
            'recieptNumber' => 'Reciept Number',
            'active' => 'Status',
            'dateCreated' => 'Date Created',
            'dateModified' => 'Date Modified',
            'insertedBy' => 'Inserted By',
            'updatedBy' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['clientID' => 'clientID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContent()
    {
        return $this->hasOne(Content::className(), ['contentID' => 'contentID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessage()
    {
        return $this->hasOne(InMessages::className(), ['messageID' => 'messageID']);
    }
}
