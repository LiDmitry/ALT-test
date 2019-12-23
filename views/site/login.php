<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';

?>
<div class="col-md-8">
    <h1>Описание</h1>

    <ul>
        <li>Для входа в приложение вам необходимо зарегистрироваться. Для этого нажмите кнопку "Зарегистрироваться"в правой части экрана</li>
        <li>Заполните фому регистрации и нажмите кнопку Регистрация"</li>
        <li>Введите ваш логин и пароль в форму авторизации и нажмите "Войти"</li>
        <li>В открывшемся приложении вы увидите форму добавления координат и карту, центрированную на вашем местоположении</li>
        <li>Чтобы добавить отметку на карту заполните форму добавления и нажмите "Добавить"</li>
        <li>Новая отметка появится ,как в списке под формой, так и на карте</li>
        <li>Чтобы удалить отметку нажмите на кнопку "&#128465;"</li>
        <li>Чтобы центрировать карту на отметке нажмите "&#128269;"</li>
        <li>Чтобы редактировать отметку нажмите "&#9998;"<ul>
                <li>Измените данные в полях выбранной отметки</li>
                <li>Нажмите на "&#10004;" чтобы сохранить измененные поля отметки</li></ul></li>
    </ul>
</div>
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
        'action'=>'/web/index.php'
    ]); ?>

        <?= $form->field($model, 'username' ,[
            'inputOptions' => [
                'placeholder'=>'Логин',
            ]])->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password' ,[
            'inputOptions' => [
                'placeholder'=>'Пароль',
            ]])->passwordInput() ?>
             <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>



        <div class="form-group">
            <div class="col-lg-12">
                <?= Html::submitButton('Войти', ['class' => 'loginbtn', 'name' => 'login-button']) ?>
            </div>

        </div>
    <a class="signupbtn" href="index.php?r=site%2Fsignup">Зарегистрировалься</a>

    <?php ActiveForm::end(); ?>


</div>
