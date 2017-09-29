<?php

namespace app\controllers;

use app\models\Org_types;
use Yii;
use app\models\Orgs;
use app\models\OrgsSearch;
use yii\base\ErrorException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrgController implements the CRUD actions for Orgs model.
 */
class OrgController extends AppController
{

    /**
     * Lists all Orgs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrgsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orgs model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orgs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orgs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->active = 1;
            $org_types_model = new Org_types();
            return $this->render('create', [
                'model' => $model,
                'org_types_model'=>$org_types_model,
            ]);
        }
    }

    /**
     * Updates an existing Orgs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $org_types_model = new Org_types();
            return $this->render('update', [
                'model' => $model,
                'org_types_model'=>$org_types_model,
            ]);
        }
    }

    /**
     * Deletes an existing Orgs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws ErrorException
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
        // вместо удаления - снятие признака active
        try {
            $model = $this->findModel($id);
        } catch (NotFoundHttpException $e) {
            throw new ErrorException('Not found org id '.$id);
        }
        $model->active = 0;
        $model->save();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Orgs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orgs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orgs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
