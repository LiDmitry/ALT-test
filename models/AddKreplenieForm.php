<?php

namespace app\models;
use yii\base\Model;

class AddKreplenieForm extends Model
{

    public $name;
    public $price;
    public $rashod;
    public $description;

    public function rules()
    {
        return [
            [['name', 'rashod', 'price', 'description'], 'required', 'message' => 'Заполните поле'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Наименование',
            'rashod' => 'Расход',
            'price' => 'Цена',
            'description' => 'Описание',
        ];
    }
}
