<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Cadastro de Usuário';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup row">
    <div class="col-sm-12 col-md-6" style="border: aliceblue solid 1px;border-color: #777777;border-radius: 10px;padding: 0 25px 25px; background-color: ghostwhite;">
        <h3 class="text-center"><?= Html::encode($this->title) ?></h3>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="row row-no-gutters">
                <?= $form->field($model, 'perfil', ['options' => ['class' => 'col-lg-6']])->dropdownList($model->listPerfil, ['default'=>'Aluno']) ?>
                <?= $form->field($model, 'matricula', ['options' => ['class' => 'col-lg-6']]) ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email', ['options' => ['class' => 'col-lg-6']]) ?>
                <?= $form->field($model, 'password', ['options' => ['class' => 'col-lg-6']])->passwordInput() ?>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-md-6">
                    <?= Html::a('Cancelar', ['site/signup'], ['class' => 'btn btn-default btn-block']) ?>.
                </div>

                <div class="col-md-6">
                    <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>
                
            </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-lg-6 hidden-md visible-lg-block">
        <div style="background-image: url(/design/img/agenda4.png); background-repeat: no-repeat; background-position: bottom; height: 404px; border-radius: 15px"></div>
    </div>
</div>
