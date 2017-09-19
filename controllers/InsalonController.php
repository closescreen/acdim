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

    /**
     * Lists all Insalon models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InsalonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Insalon model.
     * @param integer $id
     * @param integer $active
     * @param integer $salon_id
     * @param integer $created_by_user_id
     * @param integer $changed_by_user_id
     * @param string $client_tname
     * @param string $client_phone
     * @return mixed
     */
    public function actionView($id, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone),
        ]);
    }

    /**
     * Creates a new Insalon model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Insalon();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'active' => $model->active, 'salon_id' => $model->salon_id, 'created_by_user_id' => $model->created_by_user_id, 'changed_by_user_id' => $model->changed_by_user_id, 'client_tname' => $model->client_tname, 'client_phone' => $model->client_phone]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Insalon model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $active
     * @param integer $salon_id
     * @param integer $created_by_user_id
     * @param integer $changed_by_user_id
     * @param string $client_tname
     * @param string $client_phone
     * @return mixed
     */
    public function actionUpdate($id, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone)
    {
        $model = $this->findModel($id, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'active' => $model->active, 'salon_id' => $model->salon_id, 'created_by_user_id' => $model->created_by_user_id, 'changed_by_user_id' => $model->changed_by_user_id, 'client_tname' => $model->client_tname, 'client_phone' => $model->client_phone]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Insalon model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $active
     * @param integer $salon_id
     * @param integer $created_by_user_id
     * @param integer $changed_by_user_id
     * @param string $client_tname
     * @param string $client_phone
     * @return mixed
     */
    public function actionDelete($id, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone)
    {
        $this->findModel($id, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Insalon model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $active
     * @param integer $salon_id
     * @param integer $created_by_user_id
     * @param integer $changed_by_user_id
     * @param string $client_tname
     * @param string $client_phone
     * @return Insalon the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $active, $salon_id, $created_by_user_id, $changed_by_user_id, $client_tname, $client_phone)
    {
        if (($model = Insalon::findOne(['id' => $id, 'active' => $active, 'salon_id' => $salon_id, 'created_by_user_id' => $created_by_user_id, 'changed_by_user_id' => $changed_by_user_id, 'client_tname' => $client_tname, 'client_phone' => $client_phone])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
