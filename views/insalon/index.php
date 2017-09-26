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
<?php Pjax::begin(); ?>
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
            }
        },

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'state_id',
            'state_name',
            //'salon_id',
            'created',
            // 'changed',
            // 'changed_by_user_id',
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
            'created_by_user_id',
            'active',
            'm_text',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
