<?php

namespace app\modules\supplier\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\supplier\models\Offer;

/**
 * OfferSearch represents the model behind the search form of `app\modules\supplier\models\Offer`.
 */
class OfferSearch extends Offer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'board_basis_id', 'departure_date', 'return_date', 'created_at', 'status'], 'integer'],
            [['title', 'location', 'transfer', 'return_transfer', 'luggage_allowance', 'out_link'], 'safe'],
            [['price', 'longitude', 'latitude'], 'number'],
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
        $query = Offer::find();

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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'board_basis_id' => $this->board_basis_id,
            'price' => $this->price,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'departure_date' => $this->departure_date,
            'return_date' => $this->return_date,
            'created_at' => $this->created_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'transfer', $this->transfer])
            ->andFilterWhere(['like', 'return_transfer', $this->return_transfer])
            ->andFilterWhere(['like', 'luggage_allowance', $this->luggage_allowance])
            ->andFilterWhere(['like', 'out_link', $this->out_link]);

        return $dataProvider;
    }
}
