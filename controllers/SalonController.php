<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
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

class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionHello( $msg = "World! "){
        return $this->render('hello', ['msg'=>$msg]);
    }

    // Тестовая форма:
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

    // типы организаций
    public function actionOrg_types(){

	$org_types = Org_types::find()->orderBy('id')->all(); //offset()->limit()->orderBy()

	return $this->render('org_types',
	    ['org_types'=>$org_types]
	);
    }

    public function actionOrgs(){
	$orgs = Orgs::find();//->orderBy('org_type_id, name')->all();
	$pagination = new Pagination([
	    'defaultPageSize' => 2,
	    'totalCount' => $orgs->count()
	]);
	$orgs = $orgs->offset( $pagination->offset )
		    ->limit($pagination->limit)
		    ->all();
	return $this->render('orgs',
	    ['orgs'=>$orgs, 'pagination' =>$pagination ]
	);
    }

    public function actionOrg(){
	$id = Yii::$app->request->get('id'); // ->get() без параметра вернет весь массив $_GET
	
	//пример работы с сессиями
	//$session = Yii::$app->session;
	//$last_viewed_org_id = $session->get('last_viewed_org_id');
	//$session->set('last_viewed_org_id',$id);
	////$session->remove('last_viewed_org_id')' // удаление
	////$session->has('last_viewed_org_id'); // можно проверять существование
	
	// пример cookies:
	/*$got_cookies = Yii::$app->request->cookies;
	$last_viewed_org_id = $got_cookies->getValue('last_viewed_org_id');
	
	$cookies = Yii::$app->response->cookies;
	$cookies->add(new \yii\web\Cookie([
	    'name'=>'last_viewed_org_id',
	    'value'=>$id
	]));
	*/
	// удаление куки
	//$cookies->remove('last_viewed_org_id');
	
	return $this->render('org', [
	    'id'=>$id, 
	//    'last_viewed_org_id'=>$last_viewed_org_id 
	    ]);
    }
    
    public function actionUsers(){
	$userlist = Users::find();

	$pagination = new Pagination([
	    'defaultPageSize' => 2,
	    'totalCount' => $userlist->count()
	]);

	$userlist = $userlist->offset( $pagination->offset )
			    ->limit( $pagination->limit)
			    ->all();

	return $this->render('users', ['userlist'=>$userlist, 'pagination'=>$pagination]);
    }

}
