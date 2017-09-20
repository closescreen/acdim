<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InbankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inbanks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inbank-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inbank', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'active',
            'insalon_id',
            'bank_id',
            'changed',
            // 'changed_by_user_id',
            // 'state_id',
            // 'state_desc',
            // 'b1',
            // 'b2',
            // 'b3',
            // 'b4',
            // 'b5',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
