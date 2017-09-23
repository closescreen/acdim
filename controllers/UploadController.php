<?php

namespace app\controllers;

use Yii;
use app\models\Upload;
use app\models\UploadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UploadController implements the CRUD actions for Upload model.
 */
class UploadController extends AppController
{


    /**
     * Lists all Upload models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UploadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Upload model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    // ---------------------------- create -------------------------
    /**
     * Creates a new Upload model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Upload();


        if ($model->load(Yii::$app->request->post())) {
            $model->created = null;
            $model->changed = null;
            $model->created_by_user_id = Yii::$app->user->identity->id;
            $model->changed_by_user_id = Yii::$app->user->identity->id;
            $model->active = 1;
            $model->file_name = UploadedFile::getInstance($model, 'file_name');
            // filename ???
//            debug($model);
//            debug( Yii::$app->request->post() );
//            debug($_FILES);
 //           debug($model->file_name);
 //           exit;
            if ($model->file_name) {
                if ($model->validate()) {

                    debug($model->file_name);
                    exit;

                    $model->file->saveAs('uploads/org'.
                        Yii::$app->user->. $model->file->baseName . '.' . $model->file->extension);

                    return $this->redirect(['view', 'id' => $model->id]);
                }
                else{
                        debug('NO');
                        debug($model->errors);
                        exit;
                }
            }
        } else {
;
            $model->active = 1;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Upload model.
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
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Upload model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Upload model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Upload the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Upload::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
