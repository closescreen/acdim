<?php

namespace app\controllers;

use app\models\InbankLastMsgViewSearch;
use app\models\Insalon;
use app\models\Message;
use app\models\Messages;
use app\models\MessageSearch;
use app\models\Rstates;
use app\models\UploadForm;
use Yii;
use app\models\Inbank;
use app\models\InbankSearch;
use yii\base\ErrorException;
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
        $searchModel = new InbankSearch(); //-> пробуем заменить на:
        // $searchModel = new InbankLastMsgViewSearch();
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
        $states =  ArrayHelper::map(Rstates::find()->all(), 'id', 'name');
        $messages = Message::find()->where(['inbank_id'=>$id])->all();
        $messageSearchModel = new MessageSearch();
        $messageDataProvider = $messageSearchModel->search(Yii::$app->request->queryParams);
        $upload_model = new UploadForm();
        $upload_model->inbank_id = $id;

        return $this->render('view', [
            'model' => $this->findModel($id),
            'states'=> $states,
            'messages'=> $messages,
            'messageSearchModel' => $messageSearchModel,
            'messageDataProvider' => $messageDataProvider,
            'upload_model' => $upload_model,
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
        // ?? нужно, если да, то может вынести в общее место?:
        if (!Yii::$app->session->isActive) Yii::$app->session->open();

        $model = Inbank::find()->where(['inbank.id'=>$id])
            ->joinWith('insalon.salon')->one();

        $states =  ArrayHelper::map(Rstates::find()->all(), 'id', 'name');
//        debug($states);
//        exit;
//        Array
//        (
//            [new] => Новая
//            [in-work] => В работе
//            [approved] => Одобрена
//            [rejected] => Отклонена
//            [formalized] => Оформлена
//        )

        $current_state = $model->state_id;
//        debug($current_state);
//        exit;
        if (Yii::$app->user->identity->org_type_id != 'admins') {

            switch ($current_state) {
                case 'new':
                    unset($states['approved']);
                    unset($states['rejected']);
                    unset($states['formalized']);
                    break;
                case 'in-work':
                    unset($states['formalized']);
                    break;
                case 'approved':
                    unset($states['new']);
                    unset($states['rejected']);
                    break;
                case 'rejected':
                    unset($states['new']);
                    unset($states['approved']);
                    unset($states['formalized']);
                    break;
                case 'formalized':
                    // после "оформлено" уже нельзя назад
                    // потому что в insalon. ставится active=0
                    // (только через админов, наверное)
                    unset($states['new']);
                    unset($states['in-work']);
                    unset($states['rejected']);
                    unset($states['approved']);
                    break;

            }
        }

        // можно закрыть заявку ?
        $can_close = ( $model->insalon->active==0 )
            || ( $model->state_id=='rejected' )
            || ( $model->state_id=='formalized' );

//        debug($model->state_id);
//        exit;


        $messages = Message::find()->where(['inbank_id'=>$id])->all();

        $messageSearchModel = new MessageSearch();
        // тут наверняка никаких параметров
        $messageDataProvider = $messageSearchModel->search(Yii::$app->request->queryParams);

        $model->changed_by_user_id = Yii::$app->user->identity->id;

        if ( $model->load(Yii::$app->request->post()) && $model->validate()) {
            // при сохранении введенных пользователем данных:

            if ( !$model->active && !$can_close){
                Yii::$app->session->addFlash('inbank_update',
                    'Нельзя закрыть эту заявку');
                $model->active = 1;
            }




            $to_save_msg = false;
            $to_save_insalon = false;
            $closed = false;
            $msg = null;

            if ($model->isAttributeChanged('state_id')
                and $model->state_id == 'formalized') {
                // Если банк сделал "оформлено", то в салоне выставляется "не актуально"

                if ( $model->insalon->active==1 ) {
                    // если она была Актуальна:

                    $insalon = $model->insalon;
                    $insalon->active = 0;
                    $to_save_insalon = true;

                    // отписаться в сообщении, что мол оформлено:
                    $msg = new Message();
                    $msg->inbank_id = $model->id;
                    $msg->created_by_user_id = Yii::$app->user->identity->id;
                    $msg->text = 'Банк "' . $model->bank->name
                        . '" поставил статус "Оформлено". Заявке поставлен признак "Неактуальна".';
                    $to_save_msg = true;

                }


                if ($model->active==1) {
                    // Закрытие у банка
                    $model->active = 0;
                    $closed = true;
                }

            }


            if ( $model->save() ){

                Yii::$app->session->addFlash('inbank_update','Изменения сохранены');


                if ($to_save_insalon){
                    if ($insalon->save()){
                        Yii::$app->session->addFlash('inbank_update',
                            'Заявке поставлен признак "Неактуальна"');
                    }else{
                        throw new ErrorException('Не получилось поставить "Неактуально"');

                    }
                }

                if ($to_save_msg){
                    if ( !$msg->save() ){
                        throw new ErrorException('Не получилось отправись сообщение');
                    }
                }

                if ($closed){
                    // сообщение пользователю:
                    Yii::$app->session->addFlash('inbank_update',
                        'Заявке поставлен признак "Закрыта"');
                }

                return $this->redirect(['view',
                    'id' => $model->id,
                ]
            );


            }else{
                throw new ErrorException("Не получилось сохранить данные");
            }



            return $this->redirect(['update',
                'id' => $model->id,
                //'states'=>$states,
                //'can_close'=>$can_close,
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
            // при выводе формы для изменения:

            $upload_model = new UploadForm();
            $upload_model->inbank_id = $id;

            return $this->render('update', [
                'model' => $model,
                'states'=> $states,
                'can_close'=>$can_close,
                'messages'=> $messages,
                'messageSearchModel' => $messageSearchModel,
                'messageDataProvider' => $messageDataProvider,
                'upload_model' => $upload_model,
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
