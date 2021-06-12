<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'StudantSchedule';
?>
<div class="site-index">

    <div class="jumbotron">
        <p class="lead">Caro estudante, bem vindo ao</p>
        <h1>Studant Schedule!</h1>
        <p class="lead">A sua agenda de atividades acadêmicas.</p>
        <?= Html::a('Cadastre-se', ['site/signup'], ['class' => 'btn btn-lg btn-success']) ?>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Finalidade</h2>

                <p>Gerenciar o horário de execução de atividades dos estudantes, visando aumentar seu desempenho acadêmico.</p>

                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> -->
            </div>
            <div class="col-lg-4">
                <h2>Público Alvo</h2>

                <p>Alunos, professores e coordenação pedagógica de estabelecimentos de ensino.</p>

                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p> -->
            </div>
            <div class="col-lg-4">
                <h2>Funcionalidade</h2>

                <p>O coordenador/professor cria uma atividade acadêmica e vincula aos alunos cadastrados, inserindo o horário para execução desta atividade.</p>

                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p> -->
            </div>
        </div>

    </div>
</div>
