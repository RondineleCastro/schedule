<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Agenda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agenda-form">
    <?php $form = ActiveForm::begin(); ?>
    <hr>
    <div class="row">
        <?= $form->field($model, 'aluno_id', ['options' => ['class' => 'col-lg-6']])->dropdownList($model->listAlunos, ['prompt'=>'Selecione o Aluno'])?>
        <?= $form->field($model, 'atividade_id', ['options' => ['class' => 'col-lg-6']])->dropdownList($model->listAtividades, ['prompt'=>'Selecione a Atividade'])?>
        <?= $form->field($model, 'dt_inicio', ['options' => ['class' => 'col-lg-4']])->input('date') ?>
        <?= $form->field($model, 'hr_inicio', ['options' => ['class' => 'col-lg-2']])->input('time') ?>
        <?= $form->field($model, 'dt_fim', ['options' => ['class' => 'col-lg-4']])->input('date') ?>
        <?= $form->field($model, 'hr_fim', ['options' => ['class' => 'col-lg-2']])->input('time') ?>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            
        </div>
        <div class="col-lg-6 text-right">
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
        <?php ActiveForm::end(); ?>
</div>
