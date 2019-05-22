<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Downloads;

/**
 * DownloadsSearch represents the model behind the search form about `app\models\Downloads`.
 */
class DownloadsSearch extends Downloads
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['downloadsID', 'orderID', 'clientID', 'contentName', 'updatedBy', 'insertedBy'], 'integer'],
            [['downloads', 'uuid', 'active', 'dateCreated', 'dateModified'], 'safe'],
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
        $query = Downloads::find();

         if (yii::$app->user->identity->clientID !==Yii::$app->params['ADMIN_CLIENT_ID'])
              	             $query->andWhere(['clientID' =>  yii::$app->user->identity->clientID]);

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
            'downloadsID' => $this->downloadsID,
            'orderID' => $this->orderID,
            'clientID' => $this->clientID,
            'contentName' => $this->contentName,
            'updatedBy' => $this->updatedBy,
            'dateCreated' => $this->dateCreated,
            'dateModified' => $this->dateModified,
            'insertedBy' => $this->insertedBy,
        ]);

        $query->andFilterWhere(['like', 'downloads', $this->downloads])
            ->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
