<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Reception;

/**
 * ReceptionSearch represents the model behind the search form of `backend\models\Reception`.
 */
class ReceptionSearch extends Reception
{
    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['id', 'edu_center_id', 'coming_id', 'type_edu_id', 'creator', 'cancel', 'instance_id', 'comment_id','study_type','call_side'], 'integer'],
            [['name', 'tel', 'date_coming','create_date','update_date','call_name','s_name','s_tel'], 'safe'],
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
        $query = Reception::find()->where(['not in','instance_id',[0,4,5,6,7]])->orderBy(['create_date'=>SORT_DESC]);

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
            'edu_center_id' => $this->edu_center_id,
            'coming_id' => $this->coming_id,
            'type_edu_id' => $this->type_edu_id,
            //'date_coming' => $this->date_coming,
            'creator' => $this->creator,
            'study_type'=>$this->study_type,
//            'create_date' => $this->create_date,
//            'update_date' => $this->update_date,
            'instance_id' => $this->instance_id,
            'comment_id' => $this->comment_id,
            'call_name'=>$this->call_name,
            'call_side'=>$this->call_side
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'date_coming', $this->create_date])
            ->andFilterWhere(['like', 'name', $this->s_name])
            ->andFilterWhere(['like', 'tel', $this->s_tel])
            ->andFilterWhere(['like', 'tel', $this->tel]);

        return $dataProvider;
    }
}