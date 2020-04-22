<?php

namespace app\models;
use yii\base\Model;

class AddCoatingForm extends Model
{

    public $name;
    public $lenght;
    public $width;
    public $price;
    public $description;

    public function rules()
    {
        return [
            [['name', 'lenght', 'width', 'price', 'description'], 'required', 'message' => 'Заполните поле'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Наименование',
            'lenght' => 'Дина',
            'width' => 'Ширина',
            'price' => 'Цена',
            'description' => 'Описание',
        ];
    }
}
