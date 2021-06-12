<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atividade".
 *
 * @property int $id
 * @property string $titulo
 * @property string|null $descricao
 * @property int|null $coordenador_id
 * @property string $dt_in
 * @property string $dt_up
 *
 * @property Agenda[] $agendas
 * @property User $coordenador
 */
class Atividade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atividade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'descricao'], 'required'],
            [['descricao'], 'string'],
            [['coordenador_id'], 'integer'],
            [['dt_in', 'dt_up'], 'safe'],
            [['titulo'], 'string', 'max' => 255],
            [['coordenador_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['coordenador_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'descricao' => 'Descrição',
            'coordenador_id' => 'Coordenador',
            'dt_in' => 'Cadastrado em',
            'dt_up' => 'Atualizado em',

            'coordenador.name' => 'Coordenador',
        ];
    }

    /**
     * Gets query for [[Agendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgendas()
    {
        return $this->hasMany(Agenda::className(), ['atividade_id' => 'id']);
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

    public function load($data, $formName = NULL)
    {
        if ($data){
            $this->coordenador_id = $data->coordenador_id ?? Yii::$app->user->identity->id;
        }
        return parent::load($data, $formName = NULL);
    }
}
