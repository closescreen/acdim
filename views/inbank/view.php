<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inbank */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inbanks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inbank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'insalon_id',
            'bank_id',
            'changed',
            'changed_by_user_id',
            'state_id',
            'state_desc',
            'b1',
            'b2',
            'b3',
            'b4',
            'b5',
        ],
    ]) ?>

</div>
