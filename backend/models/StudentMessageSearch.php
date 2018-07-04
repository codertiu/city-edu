<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\StudentMessage;

/**
 * StudentMessageSearch represents the model behind the search form of `backend\models\StudentMessage`.
 */
class StudentMessageSearch extends StudentMessage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id', 'type_message', 'status'], 'integer'],
            [['content', 'create_date', 'answer'], 'safe'],
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
        $query = StudentMessage::find()->orderBy(['create_date'=>SORT_DESC]);

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
            'student_id' => $this->student_id,
            'type_message' => $this->type_message,
            'create_date' => $this->create_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'answer', $this->answer]);

        return $dataProvider;
    }
}
