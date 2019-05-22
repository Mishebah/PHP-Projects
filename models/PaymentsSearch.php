<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Payments;

/**
 * PaymentsSearch represents the model behind the search form about `app\models\Payments`.
 */
class PaymentsSearch extends Payments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paymentID', 'ordersID', 'clientID', 'MSISDN', 'updatedBy', 'insertedBy'], 'integer'],
            [['transactionID', 'contentName','amount', 'receiptNumber', 'businessNumber', 'FirstName', 'MiddleName', 'LastName', 'accountNumber', 'active', 'dateCreated', 'dateModified'], 'safe'],
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
        $query = Payments::find();
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
            'paymentID' => $this->paymentID,
            'ordersID' => $this->ordersID,
            'clientID' => $this->clientID,
            'MSISDN' => $this->MSISDN,
            'updatedBy' => $this->updatedBy,
            'dateCreated' => $this->dateCreated,
            'dateModified' => $this->dateModified,
            'insertedBy' => $this->insertedBy,
        ]);

        $query->andFilterWhere(['like', 'transactionID', $this->transactionID])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'receiptNumber', $this->receiptNumber])
            ->andFilterWhere(['like', 'businessNumber', $this->businessNumber])
            ->andFilterWhere(['like', 'contentName', $this->contentName])
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'MiddleName', $this->MiddleName])
            ->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'accountNumber', $this->accountNumber])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
