<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Загруженные файлы';
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="upload-index">

    <h3><?= Html::encode($this->title) ?></h3>


    <? foreach($upload_model as $upload): ?>
        <?php

            $class = $upload->created_by_user_id == Yii::$app->user->identity->id ?
                    "alert alert-success" : "alert alert-secondary";
            $file_exists = is_file($upload->file_real_name);
        ?>

<!--        <div class="--><?//=$class?><!--">-->
<!--            --><?//= Html::a($upload->file_name, ['upload/download','id'=>$upload->id]) ?>
<!--            ( --><?//= Html::encode( $upload->file_desc ) ?><!-- ) <br>-->
<!--        </div>-->

        <div class="<?=$class?>">
            <? if($file_exists): ?>
                <?= Html::a($upload->file_name, ['upload/download','id'=>$upload->id]) ?>
                ( <?= Html::encode( $upload->file_desc ) ?> )  <br>

            <? else: ?>
                <?= '(файл не найден) '. $upload->file_name .' ('. Html::encode( $upload->file_desc ).')' ?>
            <? endif; ?>
        </div>

     <? endforeach; ?>

 </div>

