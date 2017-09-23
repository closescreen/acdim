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
        <?php
            $msg_class = $message->created_by_user_id == Yii::$app->user->identity->id ?
                    "alert alert-success" : "alert alert-secondary";

        ?>

        <div class="container">
            <?= $message->created_by_user_id?>
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

