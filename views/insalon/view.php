<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Insalon */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Insalons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insalon-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'active' => $model->active, 'salon_id' => $model->salon_id, 'created_by_user_id' => $model->created_by_user_id, 'changed_by_user_id' => $model->changed_by_user_id, 'client_tname' => $model->client_tname, 'client_phone' => $model->client_phone], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'active' => $model->active, 'salon_id' => $model->salon_id, 'created_by_user_id' => $model->created_by_user_id, 'changed_by_user_id' => $model->changed_by_user_id, 'client_tname' => $model->client_tname, 'client_phone' => $model->client_phone], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'active',
            'salon_id',
            'created',
            'created_by_user_id',
            'changed',
            'changed_by_user_id',
            'client_fname',
            'client_sname',
            'client_tname',
            'client_bdate',
            'client_phone',
            'car_price',
            'down_payment',
            'equipment_cost',
            'equipment_desc',
            'car_model',
            'car_year',
            's1',
            's2',
            's3',
            's4',
            's5',
        ],
    ]) ?>

</div>
