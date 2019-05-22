<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paybill".
 *
 * @property integer $payNo
 * @property string $paybillNo
 * @property integer $clientID
 * @property string $passKey
 * @property string $consumerKey
 * @property string $consumerSecret
 * @property integer $active
 * @property string $dateActivated
 * @property integer $insertedBy
 * @property string $dateCreated
 * @property integer $updatedBy
 * @property string $dateModified
 *
 * @property Clients $client
 */
class Paybill extends MainModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paybill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paybillNo', 'clientID', 'passKey', 'consumerKey', 'consumerSecret'], 'required'],
            [['clientID', 'insertedBy', 'updatedBy'], 'integer'],
            [['dateActivated', 'dateCreated', 'dateModified'], 'safe'],
            [['paybillNo', 'passKey', 'consumerKey', 'consumerSecret'], 'string', 'max' => 50],
            [['active'], 'string', 'max' => 4],
            [['paybillNo'], 'unique'],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientID' => 'clientID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payNo' => 'Pay No',
            'paybillNo' => 'Paybill No',
            'clientID' => 'Client ID',
            'passKey' => 'Pass Key',
            'consumerKey' => 'Consumer Key',
            'consumerSecret' => 'Consumer Secret',
            'active' => 'Status',
            'dateActivated' => 'Date Activated',
            'insertedBy' => 'Inserted By',
            'dateCreated' => 'Date Created',
            'updatedBy' => 'Updated By',
            'dateModified' => 'Date Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['clientID' => 'clientID']);
    }
}
