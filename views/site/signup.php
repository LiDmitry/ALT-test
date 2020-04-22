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
<?= $form->field($model, 'iscompany')->checkbox([
    'template' => "<div class=\"qqqq\">{input} {label} Вы являетесь представителем компании? </div>\n<div class=\"col-lg-8\">{error} </div>",
    'id' => 'iscompany'
]) ?>
<?= $form->field($model, 'name',[
    'inputOptions' => [
        'placeholder'=>'Имя',
    ]]) ?>
<?= $form->field($model, 'lastname',[
    'inputOptions' => [
        'placeholder'=>'Фамилия',
    ]]) ?>
<?= $form->field($model, 'phone',[
    'inputOptions' => [
        'placeholder'=>'Номер телефона',
    ]]) ?>

<?= $form->field($model, 'companyname',[
    'inputOptions' => [
        'placeholder'=>'Имя предприятия',
        'id'=>'companyname1',
        'class'=>'nodisp',
        'value'=>'Имя компании',
    ]
]) ?>
<div class="form-group">
    <div>
        <?= Html::submitButton('Регистрация', ['class' => 'loginbtn']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
<script>
    var iscompany = document.getElementById('iscompany')
    var companyname1 = document.getElementById('companyname1')
    iscompany.onchange=function () {
        if(companyname1.classList.contains('nodisp')){companyname1.classList.remove('nodisp')}
        else {companyname1.classList.add('nodisp')}


    }

</script>
