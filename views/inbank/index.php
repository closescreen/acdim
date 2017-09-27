<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InbankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;

$dataProvider->sort->attributes['insalon.client_tname'] = [
    'asc' => ['insalon.client_tname' => SORT_ASC],
    'desc' => ['insalon.client_tname' => SORT_DESC],
];

?>
<div class="inbank-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        $columns = Yii::$app->user->identity->org_type_id == 'bank' ?
            [
                //['class' => 'yii\grid\SerialColumn'],
                ['class' => 'yii\grid\ActionColumn','template' => '{update}',],

                //'id',
                //'active',
                'insalon_id', // - номер заявки банк пусть видит как номер id insalon
                'salon_name',
                //'insalon.salon.name', //-через связь (не ищет)
                //'bank_id',
                //'bank_name', // для админов можно
                //'changed',
                //'insalon.salon_id',
                's_client_fio',
                's_client_bdate',
                's_client_phone',
                's_car_model',
                's_car_year',
                's_car_price',
                's_down_payment',
                's_equipment_cost',

//                'insalon.client_tname',
//                'insalon.client_fname',
//                'insalon.client_sname',
//                'insalon.salon.name',
                // 'changed_by_user_id',
                // 'state_id',
                // 'state_desc',
                // 'b1',
                // 'b2',
                // 'b3',
                // 'b4',
                // 'b5',
                'm_text',
            ] // - for bank
            :
            [
                //['class' => 'yii\grid\SerialColumn'],
                ['class' => 'yii\grid\ActionColumn','template' => '{update}',],

                //'id',
                //'active',
                'insalon_id', // - номер заявки банк пусть видит как номер id insalon
                //'insalon.salon.name', // - через связь не ищет
                //'bank_id',
                'salon_name',
                'bank_name', // для админов можно

                //'changed',
                //'insalon.salon_id',
                's_client_fio',
                's_client_bdate',
                's_client_phone',
                's_car_model',
                's_car_year',
                's_car_price',
                's_down_payment',
                's_equipment_cost',

//                'insalon.client_tname',
//                'insalon.client_fname',
//                'insalon.client_sname',
//                'insalon.salon.name',
                // 'changed_by_user_id',
                // 'state_id',
                // 'state_desc',
                // 'b1',
                // 'b2',
                // 'b3',
                // 'b4',
                // 'b5',
                'm_text',

            ]; // - for admins

    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model) {
            if ($model->active == 0) {
                return ['class' => 'inactive'];
            }elseif($model->state_id !== null ){
                //$state_id = $model->state_id;
                //$class = "request-status-" . $model->state_id;
                return ['class'=> "request-status-" . $model->state_id];
            }else{
                return []; 
            }
        },
        'columns' => $columns

    ]); ?>

</div>
