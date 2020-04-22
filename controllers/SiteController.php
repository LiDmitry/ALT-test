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
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_login ? 'loginme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
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
    public function actionIndex()

    {



        if (!Yii::$app->user->isGuest)
        {

                $user=User::findOne(Yii::$app->user->identity->getId());
            if($user->iscompany==1){
                if($_POST==null) {

                    $query3 = kreplenie::find();
                    $krepleniemodel = new AddKreplenieForm();
                    $query = coating::find();
                    $coatingmodel = new AddCoatingForm();

                    if ($coatingmodel->load(\Yii::$app->request->post()) && $coatingmodel->validate()) {
                        if ($krepleniemodel->load(\Yii::$app->request->post()) && $krepleniemodel->validate()) {

                            $coordinate = new coordinates();
                            $coordinate->username = Yii::$app->user->identity->username;
                            $coordinate->name = $coatingmodel->name;
                            $coordinate->width = $coatingmodel->width;;
                            $coordinate->hight = $coatingmodel->hight;

                            $coordinate->save();

                            $this->refresh();
                            return $this->render('login', [
                                'query3' => $query3,
                                'query' => $query,
                                'coatingmodel' => $coatingmodel,
                                'krepleniemodel' => $krepleniemodel,

                            ]);

                        }

                        return $this->render('login', [

                            'query' => $query,
                            'query3' => $query3,
                            'coatingmodel' => $coatingmodel,
                            'krepleniemodel' => $krepleniemodel,

                        ]);
                    }
                }


                if(isset($_POST['id']) && isset($_POST['todelete']) && isset($_POST['coat'] ))
                {
                    if($_POST['coat']==1){
                        $deletedID=$_POST['id'];

                        $todelete=$_POST['todelete'];


                        $deleted=coating::findOne($deletedID);

                        if($todelete==1){if($deleted!=null){  $deleted->delete();}}
                        if($todelete==0){if($deleted!=null){


                            $deleted->save();}

                            ;}}
                    if($_POST['coat']==0){
                        $deletedID=$_POST['id'];

                        $todelete=$_POST['todelete'];


                        $deleted=kreplenie::findOne($deletedID);

                        if($todelete==1){if($deleted!=null){  $deleted->delete();}}
                        if($todelete==0){if($deleted!=null){$deleted->save();}
                        }}}




                $query3 = kreplenie::find();
                $krepleniemodel = new AddKreplenieForm();
                $query = coating::find();
                $coatingmodel = new AddCoatingForm();
                if($coatingmodel->load(\Yii::$app->request->post()) && $coatingmodel->validate()) {

                    $coating= new coating();
                    $coating->name = $coatingmodel->name;
                    $coating->price = $coatingmodel->price;
                    $coating->description = $coatingmodel->description;
                    $coating->lenght = $coatingmodel->lenght;
                    $coating->width = $coatingmodel->width;
                    $coating->user_id = Yii::$app->user->identity->getId();
                    $coating->save();





                    return $this->render('test',[
                        'query3' => $query3,
                        'query' => $query,
                        'coatingmodel'=>$coatingmodel,
                        'krepleniemodel' => $krepleniemodel,

                    ]);

                }
                if($krepleniemodel->load(\Yii::$app->request->post()) && $krepleniemodel->validate()) {

                    $kreplenie= new kreplenie();
                    $kreplenie->name = $krepleniemodel->name;
                    $kreplenie->price = $krepleniemodel->price;
                    $kreplenie->description = $krepleniemodel->description;
                    $kreplenie->rashod = $krepleniemodel->rashod;

                    $kreplenie->user_id = Yii::$app->user->identity->getId();
                    $kreplenie->save();
                    $_POST['AddKreplenieForm']=[];

                    return $this->render('test',[
                        'query3' => $query3,
                        'query' => $query,
                        'coatingmodel'=>$coatingmodel,
                        'krepleniemodel' => $krepleniemodel,

                    ]);

                }

                return $this->render('test',[
                    'query3' => $query3,
                    'query' => $query,
                    'coatingmodel'=>$coatingmodel,
                    'krepleniemodel' => $krepleniemodel,

                ]);
            }
            else{return $this->render('user');}
        }


































        //isguest
        $model = new LoginForm();
        $query3 = kreplenie::find();
        $krepleniemodel = new AddKreplenieForm();
        $query = coating::find();
        $coatingmodel = new AddCoatingForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $query2 = user::find();
            $user = $query2->orderBy('username')
                ->all();

            foreach ($user as $User)
            {
                if($model['username']==$User['username']&& $User['iscompany']==0)
                    {return $this->render('user');}}


            return $this->render('test',[
                'query3' => $query3,
                'query' => $query,
                'coatingmodel'=>$coatingmodel,
                'krepleniemodel' => $krepleniemodel,
                'model' =>$model,

            ]);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
            'query3' => $query3,
            'query' => $query,
            'coatingmodel'=>$coatingmodel,
            'krepleniemodel' => $krepleniemodel,




        ]);

    }






    public function actionSignup(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $user = new User();
            $user->username = $model->username;
            $user->name = $model->name;
            $user->lastname = $model->lastname;
            $user->phone = $model->phone;
            $user->companyname = $model->companyname;
            $user->iscompany = $model->iscompany;
            $user->password = \Yii::$app->security->generatePasswordHash($model->password);



            if($user->save()){

                return $this->goHome();
            }
        }

        return $this->render('signup', compact('model'));

    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {Yii::$app->user->logout();

        if (!Yii::$app->user->isGuest) {

            $query3 = kreplenie::find();
            $krepleniemodel = new AddKreplenieForm();
            $query = coating::find();
            $coatingmodel = new AddCoatingForm();
            if($coatingmodel->load(\Yii::$app->request->post()) && $coatingmodel->validate()) {
                $coordinate = new coordinates();
                $coordinate->username = Yii::$app->user->identity->username;
                $coordinate->name = $coatingmodel->name;
                $coordinate->width = $coatingmodel->width;;
                $coordinate->hight = $coatingmodel->hight;

                $coordinate->save();
                return $this->render('login',[

                    'query' => $query,
                    'coatingmodel'=>$coatingmodel,
                    'krepleniemodel' => $krepleniemodel,

                ]);
                $this->refresh();
            }

            return $this->render('login',[

                'query' => $query,
                'coatingmodel'=>$coatingmodel,
                'krepleniemodel' => $krepleniemodel,

            ]);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('login', compact('model','query'));
        }
        $query3 = kreplenie::find();
        $krepleniemodel = new AddKreplenieForm();
        $query = coating::find();
        $coatingmodel = new AddCoatingForm();
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
            'query3' => $query3,
            'query' => $query,
            'coatingmodel'=>$coatingmodel,
            'krepleniemodel' => $krepleniemodel,




        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        if (!Yii::$app->user->isGuest) {
            $query3 = kreplenie::find();
            $krepleniemodel = new AddKreplenieForm();
            $query = coating::find();
            $coatingmodel = new AddCoatingForm();
            if($coatingmodel->load(\Yii::$app->request->post()) && $coatingmodel->validate()) {
                $coordinate = new coordinates();
                $coordinate->username = Yii::$app->user->identity->username;
                $coordinate->name = $coatingmodel->name;
                $coordinate->width = $coatingmodel->width;;
                $coordinate->hight = $coatingmodel->hight;

                $coordinate->save();
                return $this->render('login',[

                    'query' => $query,
                    'coatingmodel'=>$coatingmodel,

                ]);
                $this->refresh();
            }

            return $this->render('login',[

                'query' => $query,
                'coatingmodel'=>$coatingmodel,

            ]);
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('login', compact('model','query'));
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,




        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */


}
