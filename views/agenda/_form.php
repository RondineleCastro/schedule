<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Agenda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agenda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'aluno_id')->textInput() ?>

    <?php // $form->field($model, 'atividade_id')->textInput() ?>

    <?= $form->field($model, 'aluno_id', ['options' => ['class' => '']])->dropdownList($model->listAlunos, ['prompt'=>'Selecione o Aluno'])?>

    <?= $form->field($model, 'atividade_id', ['options' => ['class' => '']])->dropdownList($model->listAtividades, ['prompt'=>'Selecione a Atividade'])?>

    <?= $form->field($model, 'dt_entrega')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
