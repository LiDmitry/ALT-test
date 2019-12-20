<?php

namespace app\models;
use yii\base\Model;

class AddCoordinatesForm extends Model
{

    public $coordname;
    public $hight;
    public $width;

    public function rules()
    {
        return [
            [['coordname', 'hight', 'width'], 'required', 'message' => 'Заполните поле'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'coordname' => 'Имя',
            'hight' => 'Долгота',
            'width' => 'Широта',
        ];
    }
}
