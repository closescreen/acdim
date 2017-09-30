<?php

use app\models\UploadForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Insalon */

$this->title = "Просмотр заявки ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="insalon-view">

    <h1><?= Html::encode($this->title) ?></h1>




    <?php
       $options = ['class' => []];
       if (!$model->active) {
           Html::addCssClass($options, 'inactual');
       }
    ?>
    <?= Html::beginTag('div', $options) ?>

    <? if( $msgs = Yii::$app->session->getFlash('insalon_update') ): ?>
        <? foreach( $msgs as $msg ): ?>
            <div class="alert alert-success">
                <?= $msg ?>
            </div>
        <? endforeach; ?>
    <? endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'active',
                'label'=>'Актуально?',
                'value'=>function($m){
                    return $m->active ? 'Да' : 'Нет';
                }
                ],
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

        ],


    ] ) ?>
    <?= Html::endTag('div')?>

    <p>
        <?= Html::a('Редактировать заявку', [
            'update',
            'id' => $model->id,
            'active' => $model->active,
            'salon_id' => $model->salon_id,
            'created_by_user_id' => $model->created_by_user_id,
            'changed_by_user_id' => $model->changed_by_user_id,
            'client_tname' => $model->client_tname,
            'client_phone' => $model->client_phone
        ], ['class' => 'btn btn-primary']) ?>
    </p>




<!--    --><?///*= Html::a('Delete', [
//                'delete',
//            'id' => $model->id,
//            'active' => $model->active,
//            'salon_id' => $model->salon_id,
//            'created_by_user_id' => $model->created_by_user_id,
//            'changed_by_user_id' => $model->changed_by_user_id,
//            'client_tname' => $model->client_tname,
//            'client_phone' => $model->client_phone
//        ], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) */?>
<!--    </p>-->
</div>

<?// debug( $model->inbanks-> ); exit; ?>

<div>

    <? foreach( $model->getInbankLastMsg()
            ->orderBy(['m_created'=>SORT_DESC])
            ->all() as $inbank ): ?>
        <div class="container-fluid">
            <!-- по банку -->
            <? $css_class = 'request-status-'.$inbank->state_id ?>
            <div class=<?= $css_class?> >
                <h3><b><?= $inbank->bank->name . ' ('. $inbank->state->name.')' ?></b></h3>
            </div>
            <h4>Файлы:</h4>
            <?php


            ?>

            <div class="upload-list">
                <?= $this->render('_uploads',[
                    'upload_model'=>$inbank->uploads,
                ]) ?>

                <?php
                    $upload_model = new UploadForm();
                    $upload_model->inbank_id = $inbank->id;
                ?>

                <div class="upload-file">
                    <?= $this->render('_upload_form', ['upload_model'=>$upload_model] ) ?>
                </div>

            </div>

            <hr>
            <h4><?= 'Чат:' ?>  </h4>



            <? foreach ($inbank->messages as $message): ?>
                <!-- сообщения по inbank -->
                <?php
                // наше ли это сообщение
                $is_our_msg = ( $message->author->org_id == Yii::$app->user->identity->org_id);
                // fio автора
                $author_fio = $message->author->fio;
                // организация-автор сообщения:
                $author_org_name = $message->author->org->name;

                $is_last_msg = $message->id == $inbank->m_id;

                $div =
                    $is_our_msg ?
                        '<div class="alert alert-success">' :
                        '<div class="alert alert-info">';


                ?>

                <b><?= $is_our_msg ? $author_fio : $author_org_name ?></b>
                (<?= $is_last_msg ? ($message->created.' - последнее сообщение'): $message->created ?>)

                <?= $div ?>
                    <?= $is_last_msg? Html::tag('b', $message->text):$message->text ?>
                </div>

    
            <? endforeach;?>

           <? Url::remember(); ?>

            <?= $this->render('_answer_form',
                [
                   'inbank_model'=>$inbank,
                   // 'referer'=> Url::to(['insalon/view', 'id' => $model->id])
                ]
            ) ?>

        </div>

    <? endforeach;?>
</div>

<div class="">asd</div>