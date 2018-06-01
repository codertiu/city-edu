<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Schedule;

/**
 * ScheduleSearch represents the model behind the search form of `backend\models\Schedule`.
 */
class ScheduleSearch extends Schedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'group_id', 'day_id', 'teacher_id', 'room_id', 'active', 'since_id', 'type_of_study'], 'integer'],
            [['begin_time', 'end_time', 'create_date', 'update_date'], 'safe'],
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
        $query = Schedule::find();

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
            'group_id' => $this->group_id,
            'day_id' => $this->day_id,
            'teacher_id' => $this->teacher_id,
            'begin_time' => $this->begin_time,
            'end_time' => $this->end_time,
            'room_id' => $this->room_id,
            'active' => $this->active,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
            'since_id' => $this->since_id,
            'type_of_study' => $this->type_of_study,
        ]);

        return $dataProvider;
    }
}
