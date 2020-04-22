<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\models\Coating;
use app\models\Kreplenie;

$activeuser=Yii::$app->user->identity->companyname;
$query;
$query3;
?>
<div><h1><?php echo($activeuser); ?></h1></div>
<div class="col-md-6">
    <h3>Покрытия</h3>


<?php $form = ActiveForm::begin([


    'options' => ['class' => 'addForm'],
]) ?>
    <div class="parts">
    <?= $form->field($coatingmodel , 'name', [
        'inputOptions' => [
            'class' => 'coordname addinput',
            'placeholder' =>'Наименование',

        ]] ) ?>
    <?= $form->field($coatingmodel , 'price', [
        'inputOptions' => [
            'class' => 'hight addinput',
            'placeholder' =>'Цена',

        ]] ) ?>
    </div>
    <div class="parts">
    <?= $form->field($coatingmodel , 'lenght', [
        'inputOptions' => [
            'class' => 'width addinput',
            'placeholder' =>'Длина',



        ]] ) ?>
    <?= $form->field($coatingmodel , 'width', [
        'inputOptions' => [
            'class' => 'width addinput',
            'placeholder' =>'Ширина'



        ]] ) ?>
    </div>
    <div class="parts">
    <?= $form->field($coatingmodel , 'description', [
        'inputOptions' => [
            'class' => 'width addinput',
            'placeholder' =>'Описание',



        ]] ) ?>
        <div>
            <?= Html::submitButton('Добавить', ['class' => 'coordbutton addButton','name'=>'addCoord']) ?>
        </div>


        <?php ActiveForm::end() ?>

    </div>











    <?php

    $coating = $query->orderBy('name')

        ->all();

    ?>
    <ul>
        <?php

        foreach ($coating as $coordinate):
            if($coordinate->user_id==Yii::$app->user->identity->getId()){
           echo('<li class="coordinate" id=/"coordinate_form_'.$coordinate->id.'/">
            <form action="/web/index.php" method="post" name="'.$coordinate->id.'">
            <input readonly name="id" type="text" value="'.$coordinate->id.'" class="coordid">
            <input readonly name="coat" type="text" value="1" class="coordid">
            
            <input  readonly  class="todelete" name="todelete" id="5'.$coordinate->id.'" type="text" value="1" class="todelete">
            <div class="ppp">
            Наименование:
               <input name = "name" id="1'.$coordinate->id.'" readonly type="text" value="'.$coordinate->name.'" class="coordname togray"></div>
              <div class="ppp"> Описание:
               <input name = "description" id="2'.$coordinate->id.'" readonly class="width  togray" type="text" value="'.$coordinate->description.'" ></div>
         
              <div class="ppp"> Длина (мм):
               
               <input name = "lenght" id="1'.$coordinate->id.'" readonly type="text" value="'.$coordinate->lenght.'" class="coordname togray"></div>
              <div class="ppp"> Ширина (мм):
                <input name = "width" id="3'.$coordinate->id.'" readonly type="text" value="'.$coordinate->width.'" class="hight togray"></div>
              <div class="ppp"> Цена за кв.м (руб):  
                <input name = "price" id="1'.$coordinate->id.'" readonly type="text" value="'.$coordinate->price.'" class="coordname togray"></div>
                <button class= "coordbutton" name="addCoord" type="submit">&#128465;</button>
                
               </form></li>'); }?>



        <?php endforeach; ?>

        

    </ul></div>
<div class="col-md-6">
    <h3>Крепления</h3>


    <?php $form = ActiveForm::begin([

        'options' => ['class' => 'addForm'],
    ]) ?>
    <div class="parts">
        <?= $form->field($krepleniemodel , 'name', [
            'inputOptions' => [
                'class' => 'coordname addinput',
                'placeholder' =>'Наименование',

            ]] ) ?>
        <?= $form->field($krepleniemodel , 'price', [
            'inputOptions' => [
                'class' => 'hight addinput',
                'placeholder' =>'Цена',

            ]] ) ?>
    </div>
    <div class="parts">
        <?= $form->field($krepleniemodel , 'rashod', [
            'inputOptions' => [
                'class' => 'width addinput',
                'placeholder' =>'Расход',



            ]] ) ?>
        <div>
            <?= Html::submitButton('Добавить', ['class' => 'coordbutton addButton','name'=>'addCoord']) ?>
        </div>

    </div>
    <div class="parts">
        <?= $form->field($krepleniemodel , 'description', [
            'inputOptions' => [
                'class' => 'width addinput',
                'placeholder' =>'Описание',



            ]] ) ?>

    </div>







    <?php ActiveForm::end() ?>







    <?php

    $coating = $query->orderBy('name')

        ->all();
    $kreplenie = $query3->orderBy('name')

        ->all();


    ?>
    <ul>
        <?php

        foreach ($kreplenie as $coordinate):
            if($coordinate->user_id==Yii::$app->user->identity->getId()){
                echo('<li class="coordinate" id=/"coordinate_form_'.$coordinate->id.'/">
            <form action="/web/index.php" method="post" name="'.$coordinate->id.'">
            <input readonly name="id" type="text" value="'.$coordinate->id.'" class="coordid">
            <input readonly name="coat" type="text" value="0" class="coordid">
            <input  readonly  class="todelete" name="todelete" id="5'.$coordinate->id.'" type="text" value="1" class="todelete">
            <div class="ppp">
            Наименование:
               <input name = "name" id="1'.$coordinate->id.'" readonly type="text" value="'.$coordinate->name.'" class="coordname togray"></div>
                <div class="ppp">Описание:
               <input name = "lenght" id="1'.$coordinate->id.'" readonly type="text" value="'.$coordinate->description.'" class="coordname togray"></div>
               <div class="ppp">
            Цена (руб):
               <input name = "price" id="1'.$coordinate->id.'" readonly type="text" value="'.$coordinate->price.'" class="coordname togray"></div>
               
           
               <div class="ppp">
            Расход (шт/кв.м):
                <input name = "width" id="3'.$coordinate->id.'"pattern="^[+-]?[0-9]{1,2}\.[0-9]{1,3}" readonly type="text" value="'.$coordinate->rashod.'" class="hight togray"></div>
                
                <button class= "coordbutton" name="addCoord" type="submit">&#128465;</button>
                
               </form></li>');
            }

           ?>



        <?php endforeach; ?>



    </ul></div>





