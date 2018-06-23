<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ExtraMark;

/**
 * ExtraMarkSearch represents the model behind the search form of `backend\models\ExtraMark`.
 */
class ExtraMarkSearch extends ExtraMark
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'member_id', 'student_id', 'mark'], 'integer'],
            [['date'], 'safe'],
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
        $query = ExtraMark::find();

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
            'member_id' => $this->member_id,
            'student_id' => $this->student_id,
            'date' => $this->date,
            'mark' => $this->mark,
        ]);

        return $dataProvider;
    }
}
