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
            [['id', 'edu_center_id', 'coming_id', 'type_edu_id', 'creater',  'instance_id', 'comment_id','study_type'], 'integer'],
            [['name','surname', 'tel', 'date_coming','create_date','update_date','call_name'], 'safe'],
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
        $query = Reception::find()->where(['!=','instance_id',4])->orderBy(['create_date'=>SORT_DESC]);

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
            'date_coming' => $this->date_coming,
            'creater' => $this->creater,
            'study_type'=>$this->study_type,
//            'create_date' => $this->create_date,
//            'update_date' => $this->update_date,
            'instance_id' => $this->instance_id,
            'comment_id' => $this->comment_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'create_date', $this->create_date])
            ->andFilterWhere(['like','call_name',$this->call_name])
            ->andFilterWhere(['like', 'tel', $this->tel]);

        return $dataProvider;
    }
}