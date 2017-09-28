<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="message-index">

    <h3><?= Html::encode($this->title) ?></h3>


    <? foreach($messages as $message): ?>
<!--        --><?php
//            $msg_class = $message->created_by_user_id == Yii::$app->user->identity->id ?
//                    "alert alert-success" : "alert alert-info";
//
//        ?>

            <?php
                   // наше ли это сообщение
                $is_our_msg = ( $message->author->org_id == Yii::$app->user->identity->org_id);
                // fio автора
                $author_fio = $message->author->fio;
                // организация-автор сообщения:
                $author_org_name = $message->author->org->name;

                $msg_class =
                    $is_our_msg ?
                        'alert alert-success' :
                        'alert alert-info' ;


            ?>


         <div class="container">
            <b><?= $is_our_msg ? $author_fio : $author_org_name ?></b>
            <?= $message->created ?><br>
        </div>

        <?= Html::beginTag('div', ['class'=>$msg_class, 'role'=>"alert"]) ?>
            <?= Html::encode( $message->text ) ?>
        </div>

    <? endforeach; ?>



<!--    <p>-->
<!--        --><?//= Html::a('Новое сообщение', ['message/create', 'inbank_id' => $inbank_model->id],
//                ['class' => 'btn btn-success']
//        ); ?>
<!--    </p>-->

 </div>

