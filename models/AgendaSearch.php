<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Agenda;

/**
 * AgendaSearch represents the model behind the search form of `app\models\Agenda`.
 */
class AgendaSearch extends Agenda
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'aluno_id', 'coordenador_id', 'atividade_id'], 'integer'],
            [['dt_inicio', 'hr_inicio', 'dt_fim', 'hr_fim', 'dt_in', 'dt_up'], 'safe'],
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
        $query = Agenda::find();

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
            'aluno_id' => $this->aluno_id,
            'coordenador_id' => $this->coordenador_id,
            'atividade_id' => $this->atividade_id,
            'dt_inicio' => $this->dt_inicio,
            'hr_inicio' => $this->hr_inicio,
            'dt_fim' => $this->dt_fim,
            'hr_fim' => $this->hr_fim,
            'dt_in' => $this->dt_in,
            'dt_up' => $this->dt_up,
        ]);

        return $dataProvider;
    }
}
