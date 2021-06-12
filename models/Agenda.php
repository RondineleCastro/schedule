<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agenda".
 *
 * @property int $id
 * @property int $aluno_id
 * @property int $coordenador_id
 * @property int $atividade_id
 * @property string $dt_entrega
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
            [['dt_entrega', 'dt_in', 'dt_up'], 'safe'],
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
            'dt_entrega' => 'Data de Entrega',
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
        return User::find()
            ->select('name')
            ->where(['perfil' => 'Aluno', 'status' => User::STATUS_ACTIVE])
            ->orderBy('name')
            ->indexBy('id')
            ->column();
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
}
