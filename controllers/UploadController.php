<?php

namespace app\controllers;

use app\models\Inbank;
use app\models\UploadForm;
use Yii;
use app\models\Upload;
use app\models\UploadSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * UploadController implements the CRUD actions for Upload model.
 */
class UploadController extends AppController
{


//    /**
//     * Lists all Upload models.
//     * @return mixed
//     */
//    public function actionIndex()
//    {
//        $searchModel = new UploadSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }
//
//
//
//    /**
//     * Displays a single Upload model.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }


    // -------------------------- upload ---------------------------
    public function actionUpload()
    {
        $upload_form_model = new UploadForm();

        if (Yii::$app->request->isPost) {
            if ($upload_form_model->load(Yii::$app->request->post())) {

                $upload_form_model->file_name = UploadedFile::getInstance(
                    $upload_form_model, 'file_name');
//            debug(Yii::$app->request->post());
//            debug($upload_form_model);
//            exit;

                if ($upload_form_model->file_name) {
                    if ($upload_form_model->validate()) {

                        $inbank_id = $upload_form_model->inbank_id;
                        $inbank_model = Inbank::findOne($inbank_id);
                        //if (!$inbank_model) throw new \Exception("not found $inbank_id");
                        $bank_id = $inbank_model->bank_id;
                        //$insalon_id = $inbank_model->insalon_id;
                        $salon_id = $inbank_model->insalon->salon_id;
                        $ts = microtime(true);
                        $bn = $upload_form_model->file_name->basename;
                        $ext = $upload_form_model->file_name->extension;
                        $ym = date('Y-m');
                        $upload = Yii::getAlias('@upload');
                        $full_path = "$upload/${ym}/s${salon_id}/b${bank_id}";
                        $name = "/${ts}_${bn}.$ext";
                        $full_name = "${full_path}/$name";

                        // создание дир:
                        FileHelper::createDirectory($full_path);

                        $upload_ar_model = new Upload();
                        $upload_ar_model->inbank_id = $inbank_id;
                        $upload_ar_model->file_name = $upload_form_model->file_name;
                        $upload_ar_model->file_real_name = $full_name;
                        $upload_ar_model->file_desc = $upload_form_model->file_desc;
                        $upload_ar_model->created = null;
                        $upload_ar_model->changed = null;
                        $upload_ar_model->created_by_user_id = Yii::$app->user->identity->id;
                        $upload_ar_model->changed_by_user_id = Yii::$app->user->identity->id;
                        $upload_ar_model->active = 1;


                        if ($upload_ar_model->save()){
                            // ok
                            // сохранение файла на диск:
                            $upload_ar_model->file_name->saveAs($full_name);

                        }else{
                            // bed
                            debug($upload_ar_model->errors);
                            exit;
                        }

                    } else {
                        // не провалидировалась upload_form_model
                        debug('validate fail');
                        debug($upload_form_model);
                        debug($upload_form_model->errors);
                        exit;
                    }
                } else {
                    // не filename
                    debug('no file_name');
                    debug($upload_form_model);
                    exit;
                }
            }else{
                // не загрузилась из post
                debug('not load from post');
                exit;
            }
        }else{
            // не post
            debug('not post');
        }

        $url = Url::previous();
        return $this->redirect($url);
        //return $this->render('upload', ['upload_ar_model' => $upload_form_model]);
    }

    // --------------------- download -----------------------
    public function actionDownload($id){
        // $id - uploads.id

        $upload_model = Upload::findOne($id);


        if ($upload_model === null) throw new NotFoundHttpException('Not found');

        return Yii::$app->response
            ->sendFile( $upload_model->file_real_name );

    }


    // ---------------------------- create -------------------------
    /**
     * Creates a new Upload model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new Upload();
//
//
//        if ($model->load(Yii::$app->request->post())) {
//            $model->created = null;
//            $model->changed = null;
//            $model->created_by_user_id = Yii::$app->user->identity->id;
//            $model->changed_by_user_id = Yii::$app->user->identity->id;
//            $model->active = 1;
//            $model->file_name = UploadedFile::getInstance($model, 'file_name');
//            // filename ???
////            debug($model);
////            debug( Yii::$app->request->post() );
////            debug($_FILES);
// //           debug($model->file_name);
// //           exit;
//            if ($model->file_name) {
//                if ($model->validate()) {
//
//                    //debug($model->file_name);
//                    debug(Yii::$app->request->post());
//                    exit;
//
//                    //$org_id = Yii::$app->user->identity->org_id
//                    $inbank_id = $model->inbank_id;
//                    $inbank_model = Inbank::findOne($inbank_id);
//                    if (!$inbank_model) throw new \Exception("not found $inbank_id");
//                    $bank_id = $inbank_model->bank_id;
//                    $insalon_id = $inbank_model->insalon_id;
//                    $salon_id = $inbank_model->insalon->salon_id;
//                    $ts = microtime(true);
//                    $bn = $model->file_name->basename;
//                    $ext = $model->file_name->extension;
//                    $ym = date('Y/m');
//                    $full_fname = "uploads/${ym}/s${salon_id}/b${bank_id}/${ts}${bn}.$ext";
//                    debug($full_fname);
//                    exit;
//
////                    $model->file->saveAs('uploads/org'.
////                        Yii::$app->user->. $model->file->baseName . '.' . $model->file->extension);
//
//                    return $this->redirect(['view', 'id' => $model->id]);
//                }
//                else{
//                        debug('NO');
//                        debug($model->errors);
//                        exit;
//                }
//            }
//        } else {
//;
//            $model->active = 1;
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//    /**
//     * Updates an existing Upload model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//    /**
//     * Deletes an existing Upload model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//    /**
//     * Finds the Upload model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return Upload the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = Upload::findOne($id)) !== null) {
//            return $model;
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }
}
