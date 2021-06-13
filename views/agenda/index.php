<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AgendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agenda de Atividades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
        <table class="table table-hover table-borderless table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Atividade</th>
                    <th scope="col">Data Início</th>
                    <th scope="col">Data Fim</th>
                    <th scope="col">Coordenador</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($model as $m): ?>
                <tr>
                    <th scope="row"></th>
                    <td><?= $m->atividade->titulo ?></td>
                    <td><?= $m->dt_inicio ?></td>
                    <td><?= $m->dt_fim ?></td>
                    <td><?= $m->coordenador->name ?></td>
                    <td>
                        <?= Html::a('<i class="far fa-eye"></i>', ['atividade/view', 'id' => $m->atividade_id], ['class' => 'btn btn-success']) ?>
                    </td>
                </tr>  
            <?php endforeach ?>
            </tbody>
        </table>
        
    </div>
    
    <?php Pjax::end(); ?>

</div>
