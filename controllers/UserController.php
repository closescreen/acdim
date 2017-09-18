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
use yii\helpers\Url;

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



// ---------------------- update -------------------------

    public function actionUpdate($id)
    {
        if (Yii::$app->request->isGet and $id) {
            if ($record = Users::find()->where(['id' => $id])->one()) {
                $orgs = Orgs::find()->select(['name'])->asArray()->indexBy('id')->column();
                return $this->render('update', compact('record', 'orgs'));
            }
        }

       // debug(Yii::$app->request->post());

        if( $users = Yii::$app->request->post('Users')){
            if ($id = $users['id']){
                if ( $record = Users::findOne(['id'=>$id])){
                    $record->load(Yii::$app->request->post());
                    if ( $record->save() ){
                        return $this->redirect(Url::to(['index']));
                    }
                }
            }
        }
        else{
            debug('no');
        }




    }



    

}
