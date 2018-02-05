<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Preference;

/**
 * PreferenceSearch represents the model behind the search form of `app\models\Preference`.
 */
class PreferenceSearch extends Preference
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'created_at', 'updated_at', 'departure_date', 'return_date', 'adults', 'children', 'status'], 'integer'],
            [['max_budget'], 'number'],
            [['departure_location', 'favourite_destinations', 'comment'], 'safe'],
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
        $query = Preference::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'departure_date' => $this->departure_date,
            'return_date' => $this->return_date,
            'max_budget' => $this->max_budget,
            'adults' => $this->adults,
            'children' => $this->children,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'departure_location', $this->departure_location])
            ->andFilterWhere(['like', 'favourite_destinations', $this->favourite_destinations])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
