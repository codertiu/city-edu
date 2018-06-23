<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Mark;

/**
 * MarkSearch represents the model behind the search form of `backend\models\Mark`.
 */
class MarkSearch extends Mark
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mark_status', 'member_id', 'students_id','mark_type','dislike','absent','group_id'], 'integer'],
            [['date', 'comment'], 'safe'],
            [['mark'], 'number'],
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
        $query = Mark::find();

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
            'date' => $this->date,
            'mark_status' => $this->mark_status,
            'mark' => $this->mark,
            'absent'=>$this->absent,
            'mark_type'=>$this->mark_type,
            'dislike'=>$this->dislike,
            'group_id'=>$this->group_id,
            'member_id' => $this->member_id,
            'students_id' => $this->students_id,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
