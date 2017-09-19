<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
//use yii\web\Controller;
//use yii\web\UploadedFile;
use yii\web\Response;
use yii\filters\VerbFilter;
//use app\models\Org_types;
//use app\models\Orgs;
use app\models\Users;
use app\models\Orgs;
use app\models\UsersSearch;
use app\models\Insalon;
use yii\helpers\Url;

use yii\helpers\Html;
use yii\data\Pagination;

class InsalonController extends AppController
{

    // ----------------- create --------------------
    public function actionCreate(){
        // создать новую модель
        $insalon = new Insalon();

        // эти действия могла бы делать модель сама
        $insalon->created_by_user_id = Yii::$app->user->identity->id;
        $insalon->changed_by_user_id = Yii::$app->user->identity->id;
        $insalon->salon_id = Yii::$app->user->identity->org_id;


        return $this->render('create', compact('insalon'));
    }

    // ----------------- index ----------------------
    public function actionIndex(){
        return $this->render('index');

    }







    

}
