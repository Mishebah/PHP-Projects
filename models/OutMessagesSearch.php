<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OutMessages;

/**
 * OutMessagesSearch represents the model behind the search form about `app\models\OutMessages`.
 */
class OutMessagesSearch extends OutMessages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['messageID', 'clientID', 'ordersID', 'paymentID', 'downloadID', 'MSISDN', 'createdBy', 'updatedBy'], 'integer'],
            [['contentName', 'messageContent', 'active', 'dateCreated', 'dateModified'], 'safe'],
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
        $query = OutMessages::find();

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
            'clientID' => $this->clientID,
            'ordersID' => $this->ordersID,
            'paymentID' => $this->paymentID,
            'downloadID' => $this->downloadID,
            'MSISDN' => $this->MSISDN,
            'dateCreated' => $this->dateCreated,
            'createdBy' => $this->createdBy,
            'dateModified' => $this->dateModified,
            'updatedBy' => $this->updatedBy,
        ]);

        $query->andFilterWhere(['like', 'contentName', $this->contentName])
            ->andFilterWhere(['like', 'messageContent', $this->messageContent])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
