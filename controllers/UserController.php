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
use app\models\UsersSearch;

use yii\helpers\Html;
use yii\data\Pagination;

class UserController extends AppController
{

// ----------------- index ----------------------
    public function actionIndex( $active=1 ){

        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);    

//        $query = Users::find()
//            ->joinWith(['org' => function($query) { $query->from(['org' => 'orgs']); }]);
        
            
/*	$pagination = new Pagination([
	    'defaultPageSize' => 2,
	    'totalCount' => $userlist->count()
	]);

	$userlist = $userlist->offset( $pagination->offset )
			    ->limit( $pagination->limit)
			    ->all();
*/
	//return $this->render('index', compact('query')); //=>$userlist, 'pagination'=>$pagination]);
    }

// ------------------------- view ---------------------
 
    

}
