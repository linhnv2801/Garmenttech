<?php

namespace backend\modules\producttypes\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\producttypes\models\Producttype;

/**
 * ProducttypeSearch represents the model behind the search form about `backend\modules\producttypes\models\Producttype`.
 */
class ProducttypeSearch extends Producttype
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parents'], 'integer'],
            [['product_type_name'], 'safe'],
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
        $query = Producttype::find();

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
            'parents' => $this->parents,
        ]);

        $query->andFilterWhere(['like', 'product_type_name', $this->product_type_name]);

        return $dataProvider;
    }
}
