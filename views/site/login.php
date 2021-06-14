<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Acessar o Sistema';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login row">
    <div class="col-lg-6 hidden-md visible-lg-block">
        <div style="background-image: url(/design/img/agenda4.png); height: 345px; border-radius: 15px"></div>
    </div>
    <div class="col-sm-12 col-md-6" style="border: aliceblue solid 1px;border-color: #777777;border-radius: 10px;padding: 0 25px 25px; background-color: ghostwhite;">
        <h3 class="text-center"><?= Html::encode($this->title) ?></h3>
        <p>Digite seus dados de acesso:</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe', ['options' => ['class' => 'text-right2']])->checkbox() ?>

            <div class="row">
                <div class="col-md-6">
                    <?= Html::a('Não sou Cadastrado', ['site/signup'], ['class' => 'btn btn-default btn-block']) ?>.
                </div>

                <div class="col-md-6">
                    <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>
                
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php /*
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
                <!-- <div style="color:#999;margin:1em 0">
                    Não sou cadastrado! <?= Html::a('Cadastre-se!', ['site/signup']) ?>.
                </div> -->
                <div class="row">
                    <div class="col-md-6">
                        <?= Html::a('Não sou Cadastrado', ['site/signup'], ['class' => 'btn btn-default btn-block']) ?>.
                    </div>

                    <div class="col-md-6">
                        <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                    </div>
                    
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
*/ ?>