<?php
// от него  наследовать все 
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
//use yii\web\UploadedFile;
use yii\web\Response;
use yii\web\ErrorAction;
use yii\filters\VerbFilter;
//use app\models\LoginForm;
//use app\models\ContactForm;
//use app\models\MyForm;
//use app\models\Org_types;
//use app\models\Orgs;
//use app\models\Users;
//use yii\helpers\Html;
//use yii\data\Pagination;

class AppController extends Controller
{

// -------------------- behaviors ---------------------
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function($rule,$action){

                    if (Yii::$app->user->identity){
                        $un = Yii::$app->user->identity->username;
                        $oti = Yii::$app->user->identity->org_type_id;
                        $rr = $action->controller->module->requestedRoute;
                        $am = $action->actionMethod;
                        //debug( $action );
                        throw new \Exception("Нет доступа. ${un} ( ${oti} ) --> $rr ($am)");
                    }else{
                        print "<br>Нужно залогиниться.</br>";
                        $this->redirect('site/login');
                        // незалогиненным опасно показывать стектрейс:
                        // throw new \Exception("Нет доступа."); 
                    }    
                    
                },
                // 'only' => ['login','logout','index'], // что ловит (остальное- разрешено)
                //'except' => ['error'],  // разрешаем всем видеть ошибку
                'rules' => [

                    [
                        'controllers' => ['site'],
                        'actions' => ['login','index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'controllers' => ['site'],
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                    [
                        'controllers' => ['user','org','org_binding'],
                        // 'actions' => ['index'],
                        'allow' => true,
                        'matchCallback' => function($role,$action){

                           return  Yii::$app->user->identity and
                               Yii::$app->user->identity->in(['admins']);
                        }
                    ],

                    [
                        'controllers' => ['insalon'],
                        //'actions' => ['index'],
                        'allow' => true,
                        'matchCallback' => function($role,$action){

                            return  Yii::$app->user->identity and
                                Yii::$app->user->identity->in(['admins','salon']);
                        }
                    ],

                    [
                        'controllers' => ['inbank'],
                        //'actions' => ['index'],
                        'allow' => true,
                        'matchCallback' => function($role,$action){

                            return  Yii::$app->user->identity and
                                Yii::$app->user->identity->in(['admins','bank']);
                        }
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
            ],

        ];
    }



// ---------------------- actions -----------------------------
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
    

}
