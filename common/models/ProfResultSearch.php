<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProfResult;

/**
 * ProfResultSearch represents the model behind the search form of `common\models\ProfResult`.
 */
class ProfResultSearch extends ProfResult
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'real_type', 'int_type', 'soc_type', 'conv_type', 'ent_type', 'art_type'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ProfResult::find();

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
            'real_type' => $this->real_type,
            'int_type' => $this->int_type,
            'soc_type' => $this->soc_type,
            'conv_type' => $this->conv_type,
            'ent_type' => $this->ent_type,
            'art_type' => $this->art_type,
        ]);

        return $dataProvider;
    }
}
