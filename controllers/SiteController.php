<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
//use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MyForm;
use app\models\Org_types;
use app\models\Orgs;
use app\models\Users;

use yii\helpers\Html;
use yii\data\Pagination;

class SiteController extends AppController
{

/*
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
*/



    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
// выключил для эксперимента
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }

        $model = new LoginForm();
        
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
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

        return $this->goHome();
    }


/*    // Тестовая форма:
    public function actionForm(){
        $form = new MyForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate() ){
    	    $name = Html::encode($form->name);
    	    $email = Html::encode($form->email);
    	    $form->file = UploadedFile::getInstance($form,'file');
    	    $form->file->saveAs('uploads/'.$form->file->baseName.'.'.$form->file->extension);
        }else{
    	    $name = ''; $email='';
        }
        return $this->render('form', ['form'=>$form, 'name'=>$name, 'email'=>$email ] );
    }
*/


    

}
