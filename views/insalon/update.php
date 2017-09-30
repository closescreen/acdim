<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Insalon */

$this->title = 'Редактирование заявки: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Insalons', 'url' => ['index']];
$this->params['breadcrumbs'][] = [
    'label' => $model->id,
    'url' => 'view',
    'id' => $model->id,
    'active' => $model->active,
    'salon_id' => $model->salon_id,
    'created_by_user_id' => $model->created_by_user_id,
    'changed_by_user_id' => $model->changed_by_user_id,
    'client_tname' => $model->client_tname,
    'client_phone' => $model->client_phone,
];
$this->params['breadcrumbs'][] = 'Update';
?>


<?php


$salon_css_class = '';
if(!$model->active ){
    $salon_css_class = 'inactual'; // не актуально (в салоне)
    echo Html::beginTag('div',['class'=>$salon_css_class]);
    echo Html::tag('h3', Html::tag('b', 'Неактуальна'));
    echo Html::endTag('div');
}

?>


<div class="insalon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <? if( $msgs = Yii::$app->session->getFlash('insalon_update') ): ?>
        <? foreach( $msgs as $msg ): ?>
            <div class="alert alert-success">
                <?= $msg ?>
            </div>
        <? endforeach; ?>
    <? endif; ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

