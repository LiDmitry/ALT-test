<?php

/* @var $this yii\web\View */

use app\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\models\Coating;
use app\models\Kreplenie;
use yii\web\View;


?>
<?php
$query2 = user::find();
$user = $query2->orderBy('username')
    ->all();?>
<div class="upper">
<div class="namesup">Копания: </div><div class="namesup">Покрытие: </div><div class="namesup namesup3">Крепление:</div></div>
<div>
<select class="user_input" name="" id="select_company">
    <option value="0"></option>
    <?php
foreach ($user as $User)
{if($User['iscompany']==1){
    echo(
        '<option class="aa" value="'.$User->id.'">'.$User->companyname.'</option>');}};
?>
</select>
<?php
$query4 = coating::find();
$coating = $query4->orderBy('name')
->all();?>
<select class="user_input" name="" id="select_coating">
    <option value="0"></option>
    <?php
    foreach ($coating as $Coating)
    {
        echo(
            '<option class="nodisp change" value="'.$Coating->user_id.','.$Coating->price.'">'.$Coating->name.'  ('.$Coating->price.' за кв/м)</option>');};
    ?>
</select>
<?php
$query5 = kreplenie::find();
$kreplenie = $query5->orderBy('name')
->all();?>
<select class="user_input" name="" id="select_kreplenie">
    <option value="0"></option>
    <?php
    foreach ($kreplenie as $Kreplenie){

        echo(
            '<option class="nodisp change" value="'.$Kreplenie->user_id.','.$Kreplenie->price.','.$Kreplenie->rashod.'">'.$Kreplenie->name.'  ('.$Kreplenie->price.' за шт)</option>');};
    ?>
</select>
    <br> <br> <br>
</div>
<div>

        <input  type="text" id="hight" placeholder="Высота м">
        <input type="text" id="width" placeholder="Ширина м">

    <br>
    <br>
    <br>
    <div>Результат:</div>
    <div>
        <input type="text" id="result" placeholder="Резаультат (р)"></div>



    <div class="calc"></div>
</div>

<script>

  var select_company = document.getElementById('select_company');
  var company_id = document.getElementById('company_id');
  var hight = document.getElementById('hight');
  var width = document.getElementById('width');
  var result = document.getElementById('result');
  var coating = document.getElementById('select_coating');
  var kreplenie = document.getElementById('select_kreplenie');
  select_company.onchange=function () {

      var elem = document.querySelectorAll("option.change");
      for (var i = 0; i < elem.length; i++) {
        if(elem[i].value.split(',')[0]==select_company.value){elem[i].classList.remove('nodisp')}
        else {elem[i].classList.add('nodisp')}
      }}
  coating.onchange=function () {result.value = Math.round(width.value*hight.value*coating.value.split(',')[1]+width.value*hight.value*kreplenie.value.split(',')[1]/kreplenie.value.split(',')[2]/1000000)}
  kreplenie.onchange=function () {result.value =  Math.round(width.value*hight.value*coating.value.split(',')[1]+width.value*hight.value*kreplenie.value.split(',')[1]/kreplenie.value.split(',')[2]/1000000)}
  hight.onchange=function (){result.value = Math.round(width.value*hight.value*coating.value.split(',')[1]+width.value*hight.value*kreplenie.value.split(',')[1]/kreplenie.value.split(',')[2]/1000000)}
  width.onchange=function (){result.value =  Math.round(width.value*hight.value*coating.value.split(',')[1]+width.value*hight.value*kreplenie.value.split(',')[1]/kreplenie.value.split(',')[2]/1000000)}







</script>

