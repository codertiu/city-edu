<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\StudentsPay;

/**
 * StudentsPaySearch represents the model behind the search form of `backend\models\StudentsPay`.
 */
class StudentsPaySearch extends StudentsPay
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'contract_id', 'students_id', 'for_month','user_id','type_pay_id'], 'integer'],
            [['create_date','update_date'], 'safe'],
            [['sum'], 'number'],
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
        $query = StudentsPay::find();

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
            'contract_id' => $this->contract_id,
            'students_id' => $this->students_id,
            'sum' => $this->sum,
            'for_month' => $this->for_month,
            'user_id'=>$this->user_id,
            'type_pay_id'=>$this->type_pay_id,
        ]);

        return $dataProvider;
    }
}
