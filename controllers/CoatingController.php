<?php

namespace app\controllers;


use app\models\AddCoatingForm;
use app\models\AddKreplenieForm;
use app\models\coating;
use app\models\Kreplenie;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\User;
class CoatingController extends Controller
{

    public function actionAddcoating(){

    $query3 = kreplenie::find();
    $krepleniemodel = new AddKreplenieForm();
    $query = coating::find();
    $coatingmodel = new AddCoatingForm();
    if ($coatingmodel->load(\Yii::$app->request->post()) && $coatingmodel->validate()) {
        $coating= new coating();
        $coating->name = $coatingmodel->name;
        $coating->price = $coatingmodel->price;
        $coating->description = $coatingmodel->description;
        $coating->lenght = $coatingmodel->lenght;
        $coating->width = $coatingmodel->width;
        $coating->user_id = Yii::$app->user->identity->getId();
        $coating->save();
        return $this->render('test', [
            'query3' => $query3,
            'query' => $query,
            'coatingmodel' => $coatingmodel,
            'krepleniemodel' => $krepleniemodel,

        ]);
    }




}

}
