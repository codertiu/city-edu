<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Members;

/**
 * MembersSearch represents the model behind the search form of `backend\models\Members`.
 */
class MembersSearch extends Members
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gendar', 'edu_center_id', 'active','user_id','members_status'], 'integer'],
            [['fio', 'tel', 'address', 'about', 'img', 'file'], 'safe'],
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
        $query = Members::find();

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
            'edu_center_id' => $this->edu_center_id,
            'active' => $this->active,
            'user_id'=>$this->user_id,
            'members_status'=>$this->members_status
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
