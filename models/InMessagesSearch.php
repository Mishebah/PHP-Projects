<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InMessages;

/**
 * InMessagesSearch represents the model behind the search form about `app\models\InMessages`.
 */
class InMessagesSearch extends InMessages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['messageID', 'shortCode', 'MSISDN',  'createdBy', 'updatedBy'], 'integer'],
            [['messageContent', 'messageStatusID','active', 'dateCreated', 'dateModified'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = InMessages::find();
        if (yii::$app->user->identity->clientID !==Yii::$app->params['ADMIN_CLIENT_ID'])
              	             $query->andWhere(['clientID' =>  yii::$app->user->identity->clientID]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'messageID' => $this->messageID,
          
            'MSISDN' => $this->MSISDN,
            'shortCode' => $this->shortCode,
            'active' => $this->active,
             'messageStatusID' => $this->messageStatusID,
            'dateCreated' => $this->dateCreated,
            'createdBy' => $this->createdBy,
            'dateModified' => $this->dateModified,
            'updatedBy' => $this->updatedBy,
        ]);

        $query->andFilterWhere(['like', 'messageContent', $this->messageContent])
            ->andFilterWhere(['like', 'shortCode', $this->shortCode]);

        return $dataProvider;
    }
}
