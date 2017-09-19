<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InsalonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Insalons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insalon-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Insalon', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'active',
            'salon_id',
            'created',
            'created_by_user_id',
            // 'changed',
            // 'changed_by_user_id',
            // 'client_fname',
            // 'client_sname',
            // 'client_tname',
            // 'client_bdate',
            // 'client_phone',
            // 'car_price',
            // 'down_payment',
            // 'equipment_cost',
            // 'equipment_desc',
            // 'car_model',
            // 'car_year',
            // 's1',
            // 's2',
            // 's3',
            // 's4',
            // 's5',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
