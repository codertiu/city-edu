<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Students;

/**
 * StudentsSearch represents the model behind the search form of `backend\models\Students`.
 */
class StudentsSearch extends Students
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gendar', 'member_id', 'reg_date', 'edu_center_id', 'active','reception_id'], 'integer'],
            [['name','tel', 'address', 'image', 'file', 'pass_file', 'email', 'dob'], 'safe'],
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
        $query = Students::find()->orderBy(['reg_date'=>SORT_DESC]);

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
            'gendar' => $this->gendar,
            'member_id' => $this->member_id,
            'reg_date' => $this->reg_date,
            'edu_center_id' => $this->edu_center_id,
            'dob' => $this->dob,
            'active' => $this->active,
            'reception_id'=>$this->reception_id
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'pass_file', $this->pass_file])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
