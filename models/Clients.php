<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property integer $clientID
 * @property string $uuid
 * @property string $clientName
 * @property string $clientDesc
 * @property string $telephoneNo
 * @property string $postalAddress
 * @property string $physicalAddress
 * @property string $emailAddress
 * @property integer $active
 * @property string $activityHistory
 * @property integer $insertedBy
 * @property string $dateCreated
 * @property integer $updatedBy
 * @property string $dateModified
 *
 * @property Orders[] $orders
 * @property Payments[] $payments
 */
class Clients  extends MainModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['physicalAddress','clientName', 'telephoneNo', 'emailAddress'], 'required'],
            [['activityHistory'], 'string'],
            [['insertedBy', 'updatedBy'], 'integer'],
            [['dateCreated', 'dateModified'], 'safe'],
            [['uuid'], 'string', 'max' => 50],
            [['clientName', 'postalAddress', 'physicalAddress'], 'string', 'max' => 100],
            [['clientDesc'], 'string', 'max' => 255],
            [['telephoneNo'], 'string', 'max' => 30],
            [['emailAddress'], 'string', 'max' => 200],
            [['active'], 'string', 'max' => 3],
            [['clientName'], 'unique'],
            [['uuid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clientID' => 'Client ID',
            'uuid' => 'Uuid',
            'clientName' => 'Client Name',
            'clientDesc' => 'Client Desc',
            'telephoneNo' => 'Telephone No',
            'postalAddress' => 'Postal Address',
            'physicalAddress' => 'Physical Address',
            'emailAddress' => 'Email Address',
            'active' => 'Status',
            'activityHistory' => 'Activity History',
            'insertedBy' => 'Inserted By',
            'dateCreated' => 'Date Created',
            'updatedBy' => 'Updated By',
            'dateModified' => 'Date Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderss()
    {
        return $this->hasMany(Orderss::className(), ['clientID' => 'clientID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['clientID' => 'clientID']);
    }
}
