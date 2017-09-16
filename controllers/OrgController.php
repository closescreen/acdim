<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
//use yii\web\Controller;
//use yii\web\UploadedFile;
use yii\web\Response;
use yii\filters\VerbFilter;
//use app\models\LoginForm;
//use app\models\Org_types;
use app\models\Orgs;
use app\models\Org_bindings;
use app\models\User;
//use app\models\Users;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\data\Sort;

class OrgController extends AppController
{

    // список организаций:
    public function actionIndex($active=1){
        
//        debug($this->foo(123));
/*        // Мой велосипед  как можно котроль доступа
        if( !Yii::$app->user->identity or Yii::$app->user->identity->notin(['admins']) ){
            Yii::$app->session->addFlash('123','У вас нет доступа к этой странице'); 
            return $this->goBack(); //goHome();
        }
*/
/*        
        $sort = new Sort([
            'attributes' => [
                'org_type_id' => ['label'=>'Тип'],
                'name'  => [
//                    'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
//                    'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
//                    'default' => SORT_DESC,
                    'label' => 'Название',
                ],
            ],
        ]);
*/        
	$orgs = Orgs::find()
	    ->where(['active'=>$active]);
	//->orderBy('org_type_id, name')->all();
/*	$pagination = new Pagination([
	    'defaultPageSize' => 2,
	    'totalCount' => $orgs->count()
	]);
	$orgs = $orgs->offset( $pagination->offset )
		    ->limit($pagination->limit)
		    ->orderBy($sort->orders)
		    ->all();
*/
	return $this->render('index',
//	    ['orgs'=>$orgs, 'pagination' =>$pagination, 'sort'=>$sort ]
            compact('orgs')
	);
    }

// ------------------------------- view ------------------
    // просмотр организации
    public function actionView( $id ){
        if (!$id) return $this->goBack();

//	$id = Yii::$app->request->get('id'); // ->get() без параметра вернет весь массив $_GET
	
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

	$orgs = Orgs::findOne($id);
	$org_type_id = $orgs->org_type_id;
	
	if ( $org_type_id == 'salon' ){
            $org_bindings = Org_bindings::find()->where(['salon_id'=>$id]);
        }elseif( $org_type_id == 'bank' ){
            $org_bindings = Org_bindings::find()->where(['bank_id'=>$id]);
        }else{
            // вернуть пустой
            $org_bindings = Org_bindings::find()->limit(0);
        }
	
	return $this->render('view', compact('orgs','org_bindings')); 
	// ''=>$id, 
	//    'last_viewed_org_id'=>$last_viewed_org_id 
	//    ]
	//    );
    }

    

}
