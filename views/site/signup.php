<?php



use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username',[
    'inputOptions' => [
        'placeholder'=>'Логин',
    ]]) ?>
<?= $form->field($model, 'password',[
    'inputOptions' => [
        'placeholder'=>'Пароль',
    ]])->passwordInput() ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('Регистрация', ['class' => 'loginbtn']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
