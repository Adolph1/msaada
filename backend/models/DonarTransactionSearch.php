<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DonarTransaction;

/**
 * DonarTransactionSearch represents the model behind the search form about `backend\models\DonarTransaction`.
 */
class DonarTransactionSearch extends DonarTransaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'donar_number', 'member_id', 'payment_method'], 'integer'],
            [['trn_date', 'source_ref_no'], 'safe'],
            [['amount'], 'number'],
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
        $query = DonarTransaction::find();

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
            'trn_date' => $this->trn_date,
            'donar_number' => $this->donar_number,
            'amount' => $this->amount,
            'member_id' => $this->member_id,
            'payment_method' => $this->payment_method,
        ]);

        $query->andFilterWhere(['like', 'source_ref_no', $this->source_ref_no]);

        return $dataProvider;
    }
}
