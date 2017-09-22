<?php

namespace app\controllers;

use app\models\Insalon;
use app\models\Messages;
use app\models\Rstates;
use Yii;
use app\models\Inbank;
use app\models\InbankSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InbankController implements the CRUD actions for Inbank model.
 */
class InbankController extends AppController
{


    // ------------------------------------ index --------------------------------
    /**
     * Lists all Inbank models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InbankSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $org_type_id = Yii::$app->user->identity->org_type_id;
        $org_id = Yii::$app->user->identity->org_id;

        if ( $org_type_id == 'bank' ){
            // банки должны видеть заявки только по своему банку
            $dataProvider->query->andFilterWhere(['bank_id'=>$org_id]);
        }elseif ( $org_type_id == 'salon' ){
            // салоны если и видят это вообще, то только по своему салону
            // но тут нужно присоединенные данные insalon.salon_id
            // $dataProvider->query->andFilterWhere(['bank_id'=>$org_id]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    // ------------------------------------- view ----------------------------------
    /**
     * Displays a single Inbank model.
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
     * Creates a new Inbank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inbank();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    // -------------------------------- Update ---------------------------------
    /**
     * Updates an existing Inbank model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Inbank::find()->where(['inbank.id'=>$id])
            ->joinWith('insalon.salon')->one();

        $states =  ArrayHelper::map(Rstates::find()->all(), 'id', 'name');

        $messages = Messages::find()->where(['inbank_id'=>$id]);



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['index',
                'id' => $model->id,
                'states'=>$states,
                ]
            );
            /*  редирект на view
            return $this->redirect(['view',
                'id' => $model->id,
                'states'=>$states
                ]
            );
        */
        } else {
            return $this->render('update', [
                'model' => $model,
                'states'=> $states,
                'messages'=> $messages,
            ]);
        }
    }

    // -------------------------------- delete -------------------------------------
    /**
     * Deletes an existing Inbank model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    // ---------------------------------- findModel ---------------------------------
    /**
     * Finds the Inbank model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inbank the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inbank::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
