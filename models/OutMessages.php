<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "outMessages".
 *
 * @property integer $messageID
 * @property integer $clientID
 * @property integer $ordersID
 * @property integer $paymentID
 * @property string $contentName
 * @property integer $downloadID
 * @property string $messageContent
 * @property string $MSISDN
 * @property integer $active
 * @property string $dateCreated
 * @property integer $createdBy
 * @property string $dateModified
 * @property integer $updatedBy
 *
 * @property Payments $client
 * @property Payments $orders
 * @property Downloads $download
 */
class OutMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'outMessages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientID', 'ordersID', 'paymentID', 'contentName', 'downloadID', 'MSISDN', 'createdBy', 'updatedBy'], 'required'],
            [['clientID', 'ordersID', 'paymentID', 'downloadID', 'MSISDN', 'createdBy', 'updatedBy'], 'integer'],
            [['messageContent'], 'string'],
            [['dateCreated', 'dateModified'], 'safe'],
            [['contentName'], 'string', 'max' => 50],
            [['active'], 'string', 'max' => 3],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Payments::className(), 'targetAttribute' => ['clientID' => 'clientID']],
            [['ordersID'], 'exist', 'skipOnError' => true, 'targetClass' => Payments::className(), 'targetAttribute' => ['ordersID' => 'ordersID']],
            [['downloadID'], 'exist', 'skipOnError' => true, 'targetClass' => Downloads::className(), 'targetAttribute' => ['downloadID' => 'downloadsID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'messageID' => 'Message ID',
            'clientID' => 'Client ID',
            'ordersID' => 'Orders ID',
            'paymentID' => 'Payment ID',
            'contentName' => 'Content Name',
            'downloadID' => 'Download ID',
            'messageContent' => 'Message Content',
            'MSISDN' => 'Msisdn',
            'active' => 'Active',
            'dateCreated' => 'Date Created',
            'createdBy' => 'Created By',
            'dateModified' => 'Date Modified',
            'updatedBy' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Payments::className(), ['clientID' => 'clientID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Payments::className(), ['ordersID' => 'ordersID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDownload()
    {
        return $this->hasOne(Downloads::className(), ['downloadsID' => 'downloadID']);
    }
}
