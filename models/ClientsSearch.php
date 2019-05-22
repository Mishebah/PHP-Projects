<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clients;

/**
 * ClientsSearch represents the model behind the search form about `app\models\Clients`.
 */
class ClientsSearch extends Clients
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientID', 'insertedBy', 'updatedBy'], 'integer'],
            [['uuid', 'clientName', 'clientDesc', 'telephoneNo', 'postalAddress', 'physicalAddress', 'emailAddress', 'active', 'activityHistory', 'dateCreated', 'dateModified'], 'safe'],
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
        $query = Clients::find();

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
            'clientID' => $this->clientID,
            'insertedBy' => $this->insertedBy,
            'dateCreated' => $this->dateCreated,
            'updatedBy' => $this->updatedBy,
            'dateModified' => $this->dateModified,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'clientName', $this->clientName])
            ->andFilterWhere(['like', 'clientDesc', $this->clientDesc])
            ->andFilterWhere(['like', 'telephoneNo', $this->telephoneNo])
            ->andFilterWhere(['like', 'postalAddress', $this->postalAddress])
            ->andFilterWhere(['like', 'physicalAddress', $this->physicalAddress])
            ->andFilterWhere(['like', 'emailAddress', $this->emailAddress])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'activityHistory', $this->activityHistory]);

        return $dataProvider;
    }
}
