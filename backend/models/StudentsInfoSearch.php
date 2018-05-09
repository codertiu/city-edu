<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\StudentsInfo;

/**
 * StudentsInfoSearch represents the model behind the search form of `backend\models\StudentsInfo`.
 */
class StudentsInfoSearch extends StudentsInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'students_id', 'language', 'lavel', 'study_type', 'comfortable_time', 'type_edu_id'], 'integer'],
            [['time'], 'safe'],
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
        $query = StudentsInfo::find();

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
            'language' => $this->language,
            'lavel' => $this->lavel,
            'study_type' => $this->study_type,
            'comfortable_time' => $this->comfortable_time,
            'type_edu_id' => $this->type_edu_id,
        ]);

        $query->andFilterWhere(['like', 'time', $this->time]);

        return $dataProvider;
    }
}
