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

    <?php
       $options = ['class' => []];
       if (!$model->active) {
           Html::addCssClass($options, 'inactive');
       }
    ?>
    <?= Html::beginTag('div', $options) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'salon_id',
            'created:datetime',
            'client_tname',
            'client_fname',
            'client_sname',
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
            'created_by_user_id',
            'changed:datetime',
            'changed_by_user_id',
            'active',
        ],


    ] ) ?>
    <?= Html::endTag('div')?>

 <!--   <p>
        <?/*= Html::a('Update', [
                'update',
            'id' => $model->id,
            'active' => $model->active,
            'salon_id' => $model->salon_id,
            'created_by_user_id' => $model->created_by_user_id,
            'changed_by_user_id' => $model->changed_by_user_id,
            'client_tname' => $model->client_tname,
            'client_phone' => $model->client_phone
        ], ['class' => 'btn btn-primary']) */?>

        <?/*= Html::a('Delete', [
                'delete',
            'id' => $model->id,
            'active' => $model->active,
            'salon_id' => $model->salon_id,
            'created_by_user_id' => $model->created_by_user_id,
            'changed_by_user_id' => $model->changed_by_user_id,
            'client_tname' => $model->client_tname,
            'client_phone' => $model->client_phone
        ], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>-->

</div>

<div class="inbanks">
    <? foreach ($model->inbanks as $inbank): ?>
        <div class="container-fluid">
            <!-- по банку -->
            <h2><?= $inbank->bank->name ?>  </h2>
            <? foreach ($inbank->messages as $message): ?>
                <!-- сообщения по inbank -->
                <?php
                // наше ли это сообщение
                $is_our_msg = ( $message->author->org_id == Yii::$app->user->identity->org_id);
                // fio автора
                $author_fio = $message->author->fio;
                // организация-автор сообщения:
                $author_org_name = $message->author->org->name;

//                что-то со стилями не работает:
                $div = $is_our_msg ?
                    Html::beginTag('div', ['class'=>"alert alert-light", 'role'=>"alert"]):
                    Html::beginTag('div', ['class'=>"alert alert-primary", 'role'=>"alert"]);

                ?>

                <b><?= $is_our_msg ? $author_fio : $author_org_name ?></b>
                <?= $div ?>
                    <?= "our: $is_our_msg" ?>
                    <?= $message->text ?>
                </div>



            <? endforeach;?>

            <?= $this->render('_message_form', ['inbank_model'=>$inbank] ) ?>

        </div>

    <? endforeach;?>
</div>