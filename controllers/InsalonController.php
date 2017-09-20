<?php

namespace app\controllers;

use Yii;
use app\models\Insalon;
use app\models\InsalonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InsalonController implements the CRUD actions for Insalon model.
 */
class InsalonController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    // -------------------- index -------------------------
    public function actionIndex()
    {
        $searchModel = new InsalonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        $org_type_id = Yii::$app->user->identity->org_type_id;
        $org_id = Yii::$app->user->identity->org_id;

        if ( $org_type_id == 'salon' ){
            // салоны должны видеть заявки только по своему салону
            $dataProvider->query->andFilterWhere(['salon_id'=>$org_id]);
        }

        if ( $org_type_id == 'bank'){
            // банки должны видеть только заявки приязанных салонов
            // но в эту функцию они пока не попадают
        }

        // ( админы видят всех )


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    // ------------- view --------------------------------
    public function actionView(
        $id, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone
    )
    {
        $model = $this->findModel($id);

        return $this->render('view', compact('model'));
        //, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone),

    }

    public function actionCreate()
    {
        $model = new Insalon();


        if ($model->load(Yii::$app->request->post()) ) {

            // задание уже известных полей:
            $model->active = 1;
            $model->created_by_user_id = Yii::$app->user->identity->id;
            $model->changed_by_user_id = Yii::$app->user->identity->id;
            $model->salon_id = Yii::$app->user->identity->org_id;

            if ( $model->save() ) {
                return $this->redirect(['view',
                        'id' => $model->id,
                        'active' => $model->active,
                        'salon_id' => $model->salon_id,
                        'created_by_user_id' => $model->created_by_user_id,
                        'changed_by_user_id' => $model->changed_by_user_id,
                        'client_tname' => $model->client_tname,
                        'client_phone' => $model->client_phone]
                );
            }else{
                // ошибки при сохранении
            }
        }

            // Создание новой заявки в салоне.

            return $this->render('create', [
                'model' => $model,
            ]);

    }

    // ---------------------- update --------------------------------
    public function actionUpdate( $id )
    //    $id, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone
    //)
    {
        $model = $this->findModel( $id );
        //, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone
        //);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->changed = null; // бд вставит время правки
            $model->changed_by_user_id = Yii::$app->user->identity->id;
            if ( $model->save() ) {
                return $this->redirect(['view', 'id' => $model->id, 'active' => $model->active, 'salon_id' => $model->salon_id, 'created_by_user_id' => $model->created_by_user_id, 'changed_by_user_id' => $model->changed_by_user_id, 'client_tname' => $model->client_tname, 'client_phone' => $model->client_phone]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    // --------------------------------- delete -------------------------
    public function actionDelete($id)
//, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone)
    {

        // решить удаление будет удалением или деактивацией

        $model = $this->findModel($id);
        $model->active = 0;
        $model->save();

        //, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone)
        // ->delete();

        return $this->redirect(['index']);
    }

    // -------------------------------- findModel -------------------------
    protected function findModel($id)
//, $active, $salon_id, $created_by_user_id,
//                                 $changed_by_user_id, $client_tname, $client_phone)
    {
        if ( ($model = Insalon::findOne(['id' => $id ])) !== null ){
            //, 'active' => $active, 'salon_id' => $salon_id,
            // 'created_by_user_id' => $created_by_user_id,
            // 'changed_by_user_id' => $changed_by_user_id, 'client_tname' => $client_tname,
            // 'client_phone' => $client_phone])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
