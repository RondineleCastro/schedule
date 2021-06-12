<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgendaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agenda-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'aluno_id') ?>

    <?= $form->field($model, 'coordenador_id') ?>

    <?= $form->field($model, 'atividade_id') ?>

    <?= $form->field($model, 'dt_inicio') ?>

    <?= $form->field($model, 'hr_inicio') ?>

    <?php // echo $form->field($model, 'dt_in') ?>

    <?php // echo $form->field($model, 'dt_up') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
