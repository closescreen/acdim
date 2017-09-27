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

                'id',
                //'active',
                //'insalon_id',
                //'bank_id',
                //'bank_name', // для админов можно
                //'changed',
                //'insalon.salon_id',
                'insalon.client_tname',
                'insalon.client_fname',
                'insalon.client_sname',
                'insalon.salon.name',
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

                'id',
                //'active',
                //'insalon_id',
                //'bank_id',
                'insalon.salon.name',
                'bank_name', // для админов можно
                //'changed',
                //'insalon.salon_id',
                'insalon.client_tname',
                'insalon.client_fname',
                'insalon.client_sname',
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
        'columns' => $columns

    ]); ?>

</div>
