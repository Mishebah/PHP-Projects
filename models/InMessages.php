<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inMessages".
 *
 * @property integer $messageID
 * @property string $messageContent
 * @property integer $msgLength
 * @property integer $MSSID
 * @property integer $msgPages
 * @property integer $messageStatusID
 * @property string $dateCreated
 * @property integer $createdBy
 * @property string $dateModified
 * @property integer $updatedBy
 */
class InMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inMessages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['messageContent','active'], 'string'],
            [['shortCode', 'MSISDN',  'createdBy', 'updatedBy'], 'integer'],
            [['MSISDN', 'messageContent', 'dateCreated','createdBy', 'updatedBy'], 'required'],
            [['dateCreated', 'dateModified'], 'safe'],
            //[['msgPages'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'messageID' => 'Message ID',
            'messageContent' => 'Message Content /Keyword',
           
            'MSISDN' => 'Tel',
       
            'active' => 'Status',
             'shortCode' => 'Short Code',
            'messageStatusID' => 'Message Status',
        
            'dateCreated' => 'Date Created',
            'createdBy' => 'Created By',
            'dateModified' => 'Date Modified',
            'updatedBy' => 'Updated By',
        ];
    }
}
