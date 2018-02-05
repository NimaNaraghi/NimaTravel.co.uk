<?php

namespace app\modules\supplier\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\supplier\models\ThingsToDo;

/**
 * ThingsToDoSearch represents the model behind the search form of `app\modules\supplier\models\ThingsToDo`.
 */
class ThingsToDoSearch extends ThingsToDo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'offer_id', 'begin_date', 'end_date'], 'integer'],
            [['title', 'highlights', 'description'], 'safe'],
            [['price'], 'number'],
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
    public function search($params,$options = [])
    {
        $query = ThingsToDo::find();

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
        
        if(isset($options['offerId'])){
            $this->offer_id = $options['offerId'];
  
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'offer_id' => $this->offer_id,
            'price' => $this->price,
            'begin_date' => $this->begin_date,
            'end_date' => $this->end_date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'highlights', $this->highlights])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
