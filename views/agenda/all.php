<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AgendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agenda de Atividades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Agendar Atividade', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'aluno.name',
            'atividade.titulo',
            'dt_inicio',
            'hr_inicio',
            // 'dt_fim',
            // 'hr_fim',
            'coordenador.name',
            //'dt_in',
            //'dt_up',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'options' => [
            'class' => 'table-responsive',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
