<?php

namespace app\controllers;

use app\models\Orgs;
use Yii;
use app\models\Org_bindings;
use app\models\Org_bindingsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Org_bindingController implements the CRUD actions for Org_bindings model.
 */
class Org_bindingController extends AppController
{


    /**
     * Lists all Org_bindings models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Org_bindingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Org_bindings model.
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
     * Creates a new Org_bindings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Org_bindings();
        $orgs_model = new Orgs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'orgs_model'=>$orgs_model,
            ]);
        }
    }

    /**
     * Updates an existing Org_bindings model.
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
           $orgs_model = new Orgs();

            return $this->render('update', [
                'model' => $model,
                'orgs_model'=>$orgs_model,
            ]);
        }
    }

    /**
     * Deletes an existing Org_bindings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // здесь удаление по настоящему, потому что нет ценности в ID-шках
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Org_bindings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Org_bindings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Org_bindings::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
