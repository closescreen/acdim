<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InsalonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insalon-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новая заявка', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php

    $m_created_text = [ 'attribute' => 'm_created_text',
                //'format' => 'raw',
                'value' => function($m) {
                    return $m->m_created_text ?
                        mb_substr($m->m_created_text,0,50).'...' :
                        '';
                }
            ];

    $columns = Yii::$app->user->identity->org_type_id == 'salon' ?
        [    // колонки для салона
            ['class' => 'yii\grid\ActionColumn'],
            'id',
            'created',
            'changed',
             //'client_tname',
            'client_fio',
            // 'client_bdate',
            'client_phone',
            //'car_price',
            //'down_payment',
            //'equipment_cost',
            // 'equipment_desc',
            'car_model',
            'car_year',
            // 's1',
            // 's2',
            // 's3',
            // 's4',
            // 's5',
            //'created_by_user_id',
            //'m_created',
            $m_created_text,
            'state_name',
            'active',
                ] :
        [
                // колонки для админа
            ['class' => 'yii\grid\ActionColumn'],

                'id',
                'salon_name',
                'created',
                'changed',
                //'client_fname',
                //'client_sname',
                //'client_tname',
                'client_fio',
                // 'client_bdate',
                'client_phone',
                //'car_price',
                //'down_payment',
                //'equipment_cost',
                // 'equipment_desc',
                'car_model',
                'car_year',
                // 's1',
                // 's2',
                // 's3',
                // 's4',
                // 's5',
                //'created_by_user_id',
                //'m_created',
                 $m_created_text,
                'state_name',
                'active',


        ]
    ?>
<?php Pjax::begin(); ?>

    <?php
    $dataProvider->sort->defaultOrder =  [
             'm_created_text'=>SORT_DESC
        ];


    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model) {
            if ($model->active == 0) {
                return ['class' => 'inactual'];
            }elseif($model->state_id !== null ){
                //$state_id = $model->state_id;
                //$class = "request-status-" . $model->state_id;
                return ['class'=> "request-status-" . $model->state_id];
            }
        },

        'columns' => $columns,
    ]); ?>
<?php Pjax::end(); ?>
</div>
