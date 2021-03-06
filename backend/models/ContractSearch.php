<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Contract;

/**
 * ContractSearch represents the model behind the search form of `backend\models\Contract`.
 */
class ContractSearch extends Contract
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'students_id', 'type_edu_id','type_contract_id'], 'integer'],
            [['contract', 'bring_date','bux','date','fio','pass_seria','pass_number','from','address','work','phone1','phone2','phone3','email','title','bill','b','inn','okohx','mfo','license','director'], 'safe'],
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
        $query = Contract::find();

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
            'sum' => $this->sum,
            'date' => $this->date,
            'type_edu_id' => $this->type_edu_id,
            'type_contract_id'=>$this->type_contract_id
        ]);

        $query->andFilterWhere(['like', 'contract', $this->contract])
            ->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'pass_seria', $this->pass_seria])
            ->andFilterWhere(['like', 'pass_number', $this->pass_number])
            ->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'work', $this->work])
            ->andFilterWhere(['like', 'phone1', $this->phone1])
            ->andFilterWhere(['like', 'phone2', $this->phone2])
            ->andFilterWhere(['like', 'phone3', $this->phone3])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'bill', $this->bill])
            ->andFilterWhere(['like', 'b', $this->b])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'okohx', $this->okohx])
            ->andFilterWhere(['like', 'mfo', $this->mfo])
            ->andFilterWhere(['like', 'license', $this->license])
            ->andFilterWhere(['like', 'director', $this->director]);

        return $dataProvider;
    }
}
