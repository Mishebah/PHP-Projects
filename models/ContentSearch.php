<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Content;

/**
 * ContentsSearch represents the model behind the search form about `app\models\Content`.
 */
class ContentSearch extends Content
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contentID', 'clientID','updatedBy', 'insertedBy'], 'integer'],
            [['keyword', 'contentName', 'price', 'active', 'dateCreated', 'dateModified'], 'safe'],
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
        $query = Content::find();
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
            'contentID' => $this->contentID,
            'clientID' => $this->clientID,
            'updatedBy' => $this->updatedBy,
            'dateCreated' => $this->dateCreated,
            'dateModified' => $this->dateModified,
            'insertedBy' => $this->insertedBy,
        ]);

        $query->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'contentName', $this->contentName])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
