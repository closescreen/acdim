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
//use app\models\Users;
use yii\helpers\Html;
use yii\data\Pagination;

class Org_bindingController extends AppController
{

    public function actionIndex()
    {
        return $this->render('index');
    }



}
