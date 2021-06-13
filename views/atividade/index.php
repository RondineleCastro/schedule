<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AtividadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Atividades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atividade-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adicionar Atividade', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'dt_in',
            'titulo',
            // 'descricao:ntext',
            'coordenador.name',
            //'dt_up',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'options' => [
            'class' => 'table-responsive',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
