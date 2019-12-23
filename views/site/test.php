<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\models\coordinates;


$query;
?>

<div class="col-md-6">
    <div class="attrName">
        <div class="attr"><span >Имя</span></div>
        <div class="attr"><span >Высота</span></div>
        <div class="attr"><span >Широта</span></div>
    </div>
<?php $form = ActiveForm::begin([

    'options' => ['class' => 'addForm'],
]) ?>
<?= $form->field($coordmodel , 'coordname', [
    'inputOptions' => [
        'class' => 'coordname addinput',

    ]] ) ?>
    <?= $form->field($coordmodel , 'hight', [
        'inputOptions' => [
            'class' => 'hight addinput',
            'pattern'=>'^[+-]?[0-9]{1,2}\.[0-9]{1,3}',
            'placeholder'=>'(+/-)XX.XXX',
        ]] ) ?>
    <?= $form->field($coordmodel , 'width', [
        'inputOptions' => [
            'class' => 'width addinput',

            'pattern'=>'^[+-]?[0-9]{1,3}\.[0-9]{1,3}',
            'placeholder'=>'(+/-)XXX.XXX',
        ]] ) ?>


<div class="form-group">
    <div>
        <?= Html::submitButton('Добавить', ['class' => 'coordbutton addButton','name'=>'addCoord']) ?>
    </div>

</div>
<?php ActiveForm::end() ?>







    <?php

    $coordinates = $query->orderBy('username')

        ->all();

    ?>
    <ul>
        <?php
        foreach ($coordinates as $coordinate):  ?>

            <?php if($coordinate->username== Yii::$app->user->identity->username)
            { echo('<li class="coordinate" id=/"coordinate_form_'.$coordinate->id.'/">
            <form action="/web/index.php" method="post" name="'.$coordinate->id.'">
            <input readonly name="id" type="text" value="'.$coordinate->id.'" class="coordid">
            <input  readonly  class="todelete" name="todelete" id="5'.$coordinate->id.'" type="text" value="1" class="todelete">
               <input name = "coordname" id="1'.$coordinate->id.'" readonly type="text" value="'.$coordinate->coordname.'" class="coordname togray">
                <input name = "hight" id="3'.$coordinate->id.'"pattern="^[+-]?[0-9]{1,2}\.[0-9]{1,3}" readonly type="text" value="'.$coordinate->hight.'" class="hight togray">
                <input name = "width" id="2'.$coordinate->id.'" pattern="^[+-]?[0-9]{1,3}\.[0-9]{1,3}" readonly class="width  togray" type="text" value="'.$coordinate->width.'" >
                <button class= "coordbutton" name="addCoord" type="submit">&#128465;</button>
                <button id="4'.$coordinate->id.'" class= "coordbutton" type="button">&#9998;</button>
                <button id="8'.$coordinate->id.'" class= "savebtn coordbutton" name="addCoord" type="submit">&#10004;</button>
                <button id="7'.$coordinate->id.'" class= "coordbutton" name="Changeposition" type="button">&#128269;</button></form></li>'); }?>



        <?php endforeach; ?>

    </ul></div>
<div class="col-md-6 map" ><div id="map"></div></div>
<?php echo('<script>ymaps.ready(init);

function init() {
       var location = ymaps.geolocation;
    var myMap = new ymaps.Map("map", {
            center: [55.76, 37.64],
            zoom: 20
        }, {
            searchControlProvider: \'yandex#search\'
        });
        location.get({
        mapStateAutoApply: true
    })
        .then(
            function(result) {
                // Получение местоположения пользователя.
                var userAddress = result.geoObjects.get(0).properties.get(\'text\');
                var userCoodinates = result.geoObjects.get(0).geometry.getCoordinates();
                // Пропишем полученный адрес в балуне.
                result.geoObjects.get(0).properties.set({
                    balloonContentBody: \'Адрес: \' + userAddress +
                        \'<br/>Координаты:\' + userCoodinates
                });
                myMap.geoObjects.add(result.geoObjects)
            },
            function(err) {
                console.log(\'Ошибка: \' + err)
            }
        );');
foreach ($coordinates as $coordinate):
    if($coordinate->username== Yii::$app->user->identity->username){
echo ('
 var change=document.getElementById(7'.$coordinate->id.')
 

    $(change).click(function(){
        var wid=document.getElementById(2'.$coordinate->id.').value;
        var hig=document.getElementById(3'.$coordinate->id.').value;
      
        myMap.setCenter([hig,wid ], 4, {
            checkZoomRange: true
        });


    });

    
        
       

    myMap.geoObjects
        
          .add(new ymaps.Placemark(['.$coordinate->hight.', '.$coordinate->width.'], {
            balloonContent: \'<strong>'.$coordinate->coordname.'</strong>\'
        }, {
            preset: \'islands#icon\',
            iconColor: \'#0095b6\'
        }))
     
        ;
');}endforeach;
echo('}
 {

};
</script>');
?>
<?php
foreach ($coordinates as $coordinate):
if($coordinate->username== Yii::$app->user->identity->username){echo('<script>
    var butt=document.getElementById(4'.$coordinate->id.');
    
   $(butt).click(function(){
   var butt=document.getElementById(4'.$coordinate->id.');
   var save=document.getElementById(8'.$coordinate->id.');
   var todel=document.getElementById(5'.$coordinate->id.');
    var coordname=document.getElementById(1'.$coordinate->id.');
    var width=document.getElementById(2'.$coordinate->id.');
   
    var hight=document.getElementById(3'.$coordinate->id.');
     var elements = document.getElementsByClassName("togray");
     $(elements).prop(\'readonly\', true);
     $(elements).removeClass(\'green\');
      $(save).removeClass(\'savebtn\');
      $(todel).val(\'0\');
     $(coordname).prop(\'readonly\', false);
     $(width).prop(\'readonly\', false);
     $(hight).prop(\'readonly\', false);
     $(width).addClass(\'green\');
      
     $(hight).addClass(\'green\');
     $(coordname).addClass(\'green\');
     $(butt).addClass(\'savebtn\');
      
   
        


     
   });
</script>');};

?>
<?php endforeach;?>


