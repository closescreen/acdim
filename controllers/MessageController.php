<?php

namespace app\controllers;

use Yii;
use app\models\Message;
use app\models\MessageSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends AppController
{


    /**
     * Lists all Message models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Message model.
     * @param integer $id
     * @param integer $created_by_user_id
     * @return mixed
     */
    public function actionView($id, $created_by_user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $created_by_user_id),
        ]);
    }

    /*
     * по сути то же что и create, только ловим простую форму, не active record
     * actionCreat мб. вообще уберем
     */
    public function actionAnswer($inbank_id){
        $model = new Message();
        $model->inbank_id = $inbank_id;
        $model->created_by_user_id = Yii::$app->user->identity->id; // перезапись
        $model->created = null; // бд вставит timestamp

        if ( $model->load(Yii::$app->request->post(),'' )) {
//            debug(Yii::$app->request->post());
//            debug($model);
//            debug($model->errors);
//            exit;

            if ($model->save()) {
                // чтоб знать куда редиректить нужны данные
                //return $this->redirect(['view', 'id' => $model->id, 'created_by_user_id' => $model->created_by_user_id]);
                $url = Url::previous();
                return $this->redirect($url);

            }
        }else {
            return $this->render('create', [
                'model' => $model,
                'inbank_id' => $inbank_id,
            ]);
        }
    }




    /**
     * Creates a new Message model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($inbank_id)
    {
        debug('deprecated create called');
        exit;
        $model = new Message();
        $model->inbank_id = $inbank_id;
        $model->created_by_user_id = Yii::$app->user->identity->id;
        $model->created_by_user_id = Yii::$app->user->identity->id; // перезапись
        $model->created = null; // бд вставит timestamp

//        $model->load(Yii::$app->request->post(),'');


        if ( $model->load(Yii::$app->request->post() )) {
//            debug(Yii::$app->request->post());
//            debug($model);
//            debug($model->errors);
//            exit;

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'created_by_user_id' => $model->created_by_user_id]);
            }
        }else {
            return $this->render('create', [
                'model' => $model,
                'inbank_id' => $inbank_id,
            ]);
        }
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $created_by_user_id
     * @return mixed
     */
    public function actionUpdate($id, $created_by_user_id)
    {
        $model = $this->findModel($id, $created_by_user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'created_by_user_id' => $model->created_by_user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Message model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $created_by_user_id
     * @return mixed
     */
    public function actionDelete($id, $created_by_user_id)
    {
        $this->findModel($id, $created_by_user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $created_by_user_id
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $created_by_user_id)
    {
        if (($model = Message::findOne(['id' => $id, 'created_by_user_id' => $created_by_user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
