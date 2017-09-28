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

$dataProvider->sort->attributes['state_name'] = [
    'asc' => ['state_id' => SORT_ASC],
    'desc' => ['state_id' => SORT_DESC],
];




?>
<div class="inbank-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        $m_created_text = [ 'attribute' => 'm_created_text',
                //'format' => 'raw',
                'value' => function($m) {
                    return $m->m_created_text ?
                        mb_substr($m->m_created_text,0,50).'...' :
                        '';
                }
            ];

        $columns = Yii::$app->user->identity->org_type_id == 'bank' ?
            [ // колонки для банка
                //['class' => 'yii\grid\SerialColumn'],
                ['class' => 'yii\grid\ActionColumn','template' => '{update}',],
                'insalon_id', // - номер заявки банк пусть видит как номер id insalon
                'insalon_created',
                'salon_name',
                //'bank_name', // для админов можно
                //'insalon.salon_id',
                's_client_fio',
                //'s_client_bdate',
                //'s_client_phone',
                's_car_model',
                's_car_year',
                's_car_price',
                's_down_payment',
                's_equipment_cost',
//                'insalon.salon.name',
                // 'changed_by_user_id',
                // 'state_id',
                // 'state_desc',
                // 'b1',
                // 'b2',
                // 'b3',
                // 'b4',
                // 'b5',
                //'m_created_text',
                $m_created_text,
                'state_name',
                'changed',
                'active',

            ] // - for bank
            :
            [ // колонки для админа
                //['class' => 'yii\grid\SerialColumn'],
                ['class' => 'yii\grid\ActionColumn','template' => '{update}',],

                'insalon_id', // - номер заявки банк пусть видит как номер id insalon
                'insalon_created',
                'insalon_created',
                'salon_name',
                'bank_name', // для админов можно

                //'insalon.salon_id',
                's_client_fio',
                //'s_client_bdate',
                //'s_client_phone',
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
                //'m_created_text',
                $m_created_text,
                'changed',
                'active',

            ]; // - for admins

    ?>

    <?php
    $dataProvider->sort->defaultOrder =  [
             'insalon_created'=>SORT_DESC
        ];
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
