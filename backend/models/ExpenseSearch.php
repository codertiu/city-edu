<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Expense;

/**
 * ExpenseSearch represents the model behind the search form of `backend\models\Expense`.
 */
class ExpenseSearch extends Expense
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'currency_id', 'type_pay_id', 'expense_category_id'], 'integer'],
            [['speciality', 'date', 'comment', 'create_date', 'update_date'], 'safe'],
            [['sum'], 'number'],
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
        $query = Expense::find();

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
            'sum' => $this->sum,
            'date' => $this->date,
            'currency_id' => $this->currency_id,
            'type_pay_id' => $this->type_pay_id,
            'expense_category_id' => $this->expense_category_id,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'speciality', $this->speciality])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
