<?php

namespace app\controllers;

use app\models\Inbank;
use app\models\Org_bindings;
use Yii;
use app\models\Insalon;
use app\models\InsalonSearch;
//use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InsalonController implements the CRUD actions for Insalon model.
 */
class InsalonController extends AppController
{

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

        //if ( $org_type_id == 'bank'){
            // банки должны видеть только заявки приязанных салонов
            // но в эту функцию они пока не попадают
        //}

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

    // ------------------- distribute_to_banks --------------------
    // раскидывает заявку insalon_id по банкам [bank_id1, bank_id2, ...]
    // id - insalon.id
    public function actionDistrib_to_banks(){
        $insalon_post =  Yii::$app->request->post('Insalon');
        $insalon_id = $insalon_post['id'];

        $insalon_model = Insalon::find()->where(['id'=>$insalon_id])->one();
        if (!$insalon_model) throw new NotFoundHttpException("Нет заявки ${insalon_id}");

        // для каких банков уже есть записи в inbank при данном insalon_id
        $exists_inbank_id = Inbank::find(['insalon_id'=>$insalon_id])
            ->indexBy('bank_id')->asArray()
            ->select(['id'])->column();
        // Должно получиться Array('bank_id'=>'id')


        // список привязанных банков
        $bindings = Org_bindings::find()
                ->where(['salon_id'=>$insalon_id])
                ->asArray()->indexBy('bank_id')->select(['bank_id'])
                ->column();
            // получим: Array(bank_id=>bank_id)

            // для текущего salon_id
            //  для каждого bank_id
            //   должно иметься по одной строке в inbank
            // Тогда считаем, что все банки увидели заявку.


        // для каждого связанного банка
        foreach ($bindings as $bank_id){

                // если записи еще нет
                if( !isset( $exists_inbank_id[$bank_id] )){
                    // создать запись в inbanks
                    $new_inbank_model = new Inbank();
                    $new_inbank_model->insalon_id = $insalon_id;
                    $new_inbank_model->bank_id = $bank_id;
                    $new_inbank_model->changed_by_user_id = 0;
                    $new_inbank_model->state_id = 'new';

                    $new_inbank_model->save();


                    if ($new_inbank_model->save()){
                        // insalon model:

                    }else{
                        // ошибка сохранения
                        debug($new_inbank_model->errors);
                        exit;
                    }
                }
        }

        $model = $this->findModel( $insalon_id );
        return $this->render('update', compact('model'));
    }


    // ------------------ create ------------------------------
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
                // раскидать заявку по банкам


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
        $find_cond = ['id' => $id ];

        $org_type_id = Yii::$app->user->identity->org_type_id;
        $org_id = Yii::$app->user->identity->org_id;

        if ( $org_type_id == 'salon' ){
            // салоны должны иметь доступ только по своему салону
            //$dataProvider->query->andFilterWhere(['salon_id'=>$org_id]);
            $find_cond['salon_id'] = $org_id;
        }


        if ( ($model = Insalon::findOne( $find_cond )) !== null ){
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
