<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orders;

/**
 * OrdersSearch represents the model behind the search form about `app\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderID', 'clientID', 'MSISDN', 'contentID', 'messageID', 'active', 'insertedBy', 'updatedBy'], 'integer'],
            [['payerNarration', 'name', 'checkoutRequestID', 'recieptNumber', 'dateCreated', 'dateModified'], 'safe'],
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
        $query = Orders::find();

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
            'orderID' => $this->orderID,
            'clientID' => $this->clientID,
            'MSISDN' => $this->MSISDN,
            'contentID' => $this->contentID,
            'messageID' => $this->messageID,
            'active' => $this->active,
            'dateCreated' => $this->dateCreated,
            'dateModified' => $this->dateModified,
            'insertedBy' => $this->insertedBy,
            'updatedBy' => $this->updatedBy,
        ]);

        $query->andFilterWhere(['like', 'payerNarration', $this->payerNarration])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'checkoutRequestID', $this->checkoutRequestID])
            ->andFilterWhere(['like', 'recieptNumber', $this->recieptNumber]);

        return $dataProvider;
    }
}
