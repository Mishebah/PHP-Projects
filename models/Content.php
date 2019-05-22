<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property integer $contentID
 * @property integer $clientID
 * @property string $keyword
 * @property string $content
 * @property integer $price
 * @property string $description
 * @property string $originalFileName
 * @property string $generatedFileName
 * @property integer $updatedBy
 * @property integer $active
 * @property string $dateCreated
 * @property string $dateModified
 * @property integer $insertedBy
 *
 * @property Clients $client
 * @property Users $insertedBy0
 * @property Users $updatedBy0
 */
class Content extends MainModel
{
       public $contentfile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                     [['contentfile'],'file','checkExtensionByMimeType' => false, 'extensions' => 'mp3,mp4'],

            [['clientID', 'keyword','shortCode','contentfile',  'price', 'description'], 'required'],
            [['clientID', 'price', 'updatedBy', 'active','insertedBy'], 'integer'],
            [['contentName', 'shortCode','description'], 'string'],
            [['dateCreated', 'dateModified'], 'safe'],
            [['keyword'], 'string', 'max' => 200],
            [['originalFileName', 'generatedFileName'], 'string', 'max' => 50],
            [['keyword'], 'unique'],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientID' => 'clientID']],
            [['insertedBy'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['insertedBy' => 'userID']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updatedBy' => 'userID']],
        ];
    }

    
  

    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contentID' => 'Content ID',
            'clientID' => 'Client ID',
            'keyword' => 'Keyword',
            'shortCode' => 'Short Code',
            'contentName' => 'Content Name',
            'price' => 'Price',
            'description' => 'Description',
            'originalFileName' => 'Original File Name',
            'generatedFileName' => 'Generated File Name',
            'updatedBy' => 'Updated By',
            'active' => 'Status',
            'dateCreated' => 'Date Created',
            'dateModified' => 'Date Modified',
            'insertedBy' => 'Inserted By',
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
    public function getInsertedBy0()
    {
        return $this->hasOne(Users::className(), ['userID' => 'insertedBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy0()
    {
        return $this->hasOne(Users::className(), ['userID' => 'updatedBy']);
    }
}
