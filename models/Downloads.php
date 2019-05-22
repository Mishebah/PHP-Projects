<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "downloads".
 *
 * @property integer $downloadsID
 * @property integer $clientID
 * @property string $contentName
 * @property integer $orderID
 * @property string $downloads
 * @property string $MSISDN
 * @property string $uuid
 * @property integer $active
 * @property string $dateCreated
 * @property string $dateModified
 * @property integer $insertedBy
 * @property integer $updatedBy
 *
 * @property Payments $client
 * @property Payments $contentName0
 * @property Payments $mSISDN
 * @property Payments $order
 */
class Downloads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'downloads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientID', 'contentName', 'orderID', 'downloads', 'MSISDN', 'uuid'], 'required'],
            [['clientID', 'orderID', 'MSISDN', 'insertedBy', 'updatedBy'], 'integer'],
            [['dateCreated', 'dateModified'], 'safe'],
            [['contentName', 'downloads', 'uuid'], 'string', 'max' => 50],
            [['active'], 'string', 'max' => 4],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Payments::className(), 'targetAttribute' => ['clientID' => 'clientID']],
            [['contentName'], 'exist', 'skipOnError' => true, 'targetClass' => Payments::className(), 'targetAttribute' => ['contentName' => 'contentName']],
            [['MSISDN'], 'exist', 'skipOnError' => true, 'targetClass' => Payments::className(), 'targetAttribute' => ['MSISDN' => 'MSISDN']],
            [['orderID'], 'exist', 'skipOnError' => true, 'targetClass' => Payments::className(), 'targetAttribute' => ['orderID' => 'ordersID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'downloadsID' => 'Downloads ID',
            'clientID' => 'Client ID',
            'contentName' => 'Content Name',
            'orderID' => 'Order ID',
            'downloads' => 'Downloads',
            'MSISDN' => 'Msisdn',
            'uuid' => 'Uuid',
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
        return $this->hasOne(Payments::className(), ['clientID' => 'clientID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentName0()
    {
        return $this->hasOne(Payments::className(), ['contentName' => 'contentName']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMSISDN()
    {
        return $this->hasOne(Payments::className(), ['MSISDN' => 'MSISDN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Payments::className(), ['ordersID' => 'orderID']);
    }
}
