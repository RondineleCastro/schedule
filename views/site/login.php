<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Acessar o Sistema';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <p>Digite seus dados de acesso:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    Xiii... esqueci minha senha! <?= Html::a('Quero redefiní-la', ['site/request-password-reset']) ?>.
                </div>
                <div style="color:#999;margin:1em 0">
                    Não sou cadastrado! <?= Html::a('Cadastre-se!', ['site/signup']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
