<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubStudents;

/**
 * SubStudentsSearch represents the model behind the search form of `backend\models\SubStudents`.
 */
class SubStudentsSearch extends SubStudents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'students_id', 'group_id'], 'integer'],
            [['begin_date', 'end_date'], 'safe'],
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
        $query = SubStudents::find();

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
            'students_id' => $this->students_id,
            'begin_date' => $this->begin_date,
            'end_date' => $this->end_date,
            'group_id' => $this->group_id,
        ]);

        return $dataProvider;
    }
}
