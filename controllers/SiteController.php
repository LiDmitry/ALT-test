<?php

namespace app\controllers;

use app\models\AddCoordinatesForm;
use app\models\coordinates;
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
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()

    {



        if (!Yii::$app->user->isGuest) {
            if($_POST==null){









                $query = coordinates::find();
                $coordmodel = new AddCoordinatesForm();
                if($coordmodel->load(\Yii::$app->request->post()) && $coordmodel->validate()) {


                    $coordinate = new coordinates();
                    $coordinate->username = Yii::$app->user->identity->username;
                    $coordinate->coordname = $coordmodel->coordname;
                    $coordinate->width = $coordmodel->width;;
                    $coordinate->hight = $coordmodel->hight;

                    $coordinate->save();
                    $this->refresh();
                    return $this->render('test',[

                        'query' => $query,
                        'coordmodel'=>$coordmodel,

                    ]);

                }

                return $this->render('test',[

                    'query' => $query,
                    'coordmodel'=>$coordmodel,

                ]);
            }





              print_r($_POST);
            $deletedID=$_POST['id'];
            $todelete=$_POST['todelete'];
            $coordname=$_POST['coordname'];
            $width=$_POST['width'];
            $hight=$_POST['hight'];
            $deleted=coordinates::findOne($deletedID);

            if($todelete==1){if($deleted!=null){  $deleted->delete();}}
            if($todelete==0){if($deleted!=null){
                $deleted->coordname=$coordname;
                $deleted->width=$width;
                $deleted->hight=$hight;
                $deleted->save();
                ;}}

            $query = coordinates::find();
            $coordmodel = new AddCoordinatesForm();
            if($coordmodel->load(\Yii::$app->request->post()) && $coordmodel->validate()) {


                $coordinate = new coordinates();
                $coordinate->username = Yii::$app->user->identity->username;
                $coordinate->coordname = $coordmodel->coordname;
                $coordinate->width = $coordmodel->width;;
                $coordinate->hight = $coordmodel->hight;

                $coordinate->save();
                $this->refresh();
                return $this->render('test',[

                    'query' => $query,
                    'coordmodel'=>$coordmodel,

                ]);

            }

            return $this->render('test',[

                'query' => $query,
                'coordmodel'=>$coordmodel,

            ]);
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $query = coordinates::find();
            $coordmodel = new AddCoordinatesForm();

            $this->refresh();
            return $this->render('test',[

                'query' => $query,
                'coordmodel'=>$coordmodel,

            ]);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,


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
            $query = coordinates::find();
            $coordmodel = new AddCoordinatesForm();
            if($coordmodel->load(\Yii::$app->request->post()) && $coordmodel->validate()) {
                $coordinate = new coordinates();
                $coordinate->username = Yii::$app->user->identity->username;
                $coordinate->coordname = $coordmodel->coordname;
                $coordinate->width = $coordmodel->width;;
                $coordinate->hight = $coordmodel->hight;

                $coordinate->save();
                return $this->render('test',[

                    'query' => $query,
                    'coordmodel'=>$coordmodel,

                ]);
                $this->refresh();
            }

            return $this->render('test',[

                'query' => $query,
                'coordmodel'=>$coordmodel,

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
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        if (!Yii::$app->user->isGuest) {
            $query = coordinates::find();
            $coordmodel = new AddCoordinatesForm();
            if($coordmodel->load(\Yii::$app->request->post()) && $coordmodel->validate()) {
                $coordinate = new coordinates();
                $coordinate->username = Yii::$app->user->identity->username;
                $coordinate->coordname = $coordmodel->coordname;
                $coordinate->width = $coordmodel->width;;
                $coordinate->hight = $coordmodel->hight;

                $coordinate->save();
                return $this->render('test',[

                    'query' => $query,
                    'coordmodel'=>$coordmodel,

                ]);
                $this->refresh();
            }

            return $this->render('test',[

                'query' => $query,
                'coordmodel'=>$coordmodel,

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
