<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';

?>
<div class="col-md-8"></div>
<div class="col-md-4">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Введите логин и пароль:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],

        ],
        'action'=>'/web/login.php'
    ]); ?>

        <?= $form->field($model, 'username' ,[
            'inputOptions' => [
                'placeholder'=>'Логин',
            ]])->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password' ,[
            'inputOptions' => [
                'placeholder'=>'Пароль',
            ]])->passwordInput() ?>



        <div class="form-group">
            <div class="col-lg-12">
                <?= Html::submitButton('Войти', ['class' => 'loginbtn', 'name' => 'login-button']) ?>
            </div>

        </div>
    <a class="signupbtn" href="index.php?r=site%2Fsignup">Зарегистрировалься</a>

    <?php ActiveForm::end(); ?>


</div>
