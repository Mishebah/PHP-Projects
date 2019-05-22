<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paybill;

/**
 * PaybillSearch represents the model behind the search form about `app\models\Paybill`.
 */
class PaybillSearch extends Paybill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payNo', 'clientID', 'passKey', 'consumerKey', 'insertedBy', 'updatedBy'], 'integer'],
            [['paybillNo'],'string'],
            [['consumerSecret', 'active', 'dateActivated', 'dateCreated', 'dateModified'], 'safe'],
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
        $query = Paybill::find();
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
            'paybillNo' => $this->paybillNo,
            'clientID' => $this->clientID,
            'passKey' => $this->passKey,
            'consumerKey' => $this->consumerKey,
            'dateActivated' => $this->dateActivated,
            'insertedBy' => $this->insertedBy,
            'dateCreated' => $this->dateCreated,
            'updatedBy' => $this->updatedBy,
            'dateModified' => $this->dateModified,
        ]);

        $query->andFilterWhere(['like', 'consumerSecret', $this->consumerSecret])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
