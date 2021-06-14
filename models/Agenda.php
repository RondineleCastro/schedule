<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "agenda".
 *
 * @property int $id
 * @property int $aluno_id
 * @property int $coordenador_id
 * @property int $atividade_id
 * @property string $dt_inicio
 * @property string $hr_inicio
 * @property string $dt_fim
 * @property string $hr_fim
 * @property string $dt_in
 * @property string $dt_up
 *
 * @property User $aluno
 * @property User $coordenador
 * @property Atividade $atividade
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agenda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aluno_id', 'coordenador_id', 'atividade_id'], 'required'],
            [['aluno_id', 'coordenador_id', 'atividade_id'], 'integer'],
            [['dt_inicio', 'hr_inicio', 'dt_fim', 'hr_fim', 'dt_in', 'dt_up'], 'safe'],
            [['aluno_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['aluno_id' => 'id']],
            [['coordenador_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['coordenador_id' => 'id']],
            [['atividade_id'], 'exist', 'skipOnError' => true, 'targetClass' => Atividade::className(), 'targetAttribute' => ['atividade_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aluno_id' => 'Aluno',
            'coordenador_id' => 'Coordenador',
            'atividade_id' => 'Atividade',
            'dt_inicio' => 'Data Início',
            'hr_inicio' => 'Hora Início',
            'dt_fim' => 'Data Fim',
            'hr_fim' => 'Hora Fim',
            'dt_in' => 'Cadastrado em',
            'dt_up' => 'Atualizado em',

            'aluno.name' => 'Aluno',
            'coordenador.name' => 'Coordenador',
            'atividade.titulo' => 'Atividade',
        ];
    }

    /**
     * Gets query for [[Aluno]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(User::className(), ['id' => 'aluno_id']);
    }

    /**
     * Gets query for [[Coordenador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoordenador()
    {
        return $this->hasOne(User::className(), ['id' => 'coordenador_id']);
    }

    /**
     * Gets query for [[Atividade]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtividade()
    {
        return $this->hasOne(Atividade::className(), ['id' => 'atividade_id']);
    }

    public function getListAlunos()
    {
        // return User::find()
        //     ->select('name')
        //     ->where(['perfil' => 'Aluno', 'status' => User::STATUS_ACTIVE])
        //     ->orderBy('name')
        //     ->indexBy('id')
        //     ->column();
        
        $s = User::find()
            ->select(['id','name','matricula'])
            ->where(['perfil' => 'Aluno', 'status' => User::STATUS_ACTIVE])
            ->orderBy('name')
            ->asArray()
            ->all();
        $r = array();
        foreach ($s as $v){
            $r[$v['id']] = $v['matricula'] . ' - ' . $v['name'];
        }

        return $r;
    }

    public function getListAtividades()
    {
        return Atividade::find()
            ->select('titulo')
            ->orderBy('titulo')
            ->indexBy('id')
            ->column();
    }

    public function load($data, $formName = NULL)
    {
        if ($data){
            $this->coordenador_id = $data->coordenador_id ?? Yii::$app->user->identity->id;
        }
        return parent::load($data, $formName = NULL);
    }

    public function agendaAlunoJSON($idAluno = null)
    {
        $where = $idAluno ? ['aluno_id' => $idAluno] : null;
        
        $model = Agenda::find()
            ->select(['id', 'atividade_id', 'dt_inicio', 'hr_inicio', 'dt_fim', 'hr_fim'])
            ->where($where)
            ->orderBy('dt_inicio, hr_inicio DESC')
            ->all();

        $return = array();
        foreach ($model as $v){
            $v = (object) $v;
            // Formação de JSON para o CalendarJS
            $agenda = [
                'id' => $v->id,
                'title' => $v->atividade->titulo,
                'start' => $v->dt_inicio . 'T' . $v->hr_inicio,
                'end' => $v->dt_fim . 'T' . $v->hr_fim,
                'url' => Url::toRoute(['atividade/view', 'id' => $v->atividade_id]),
            ];

            array_push($return, $agenda);
        }
        
        return json_encode($return);
    }
}
