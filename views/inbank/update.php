<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Inbank */

// todo: номер зявки лучше чтоб был -> из insalon.id
$this->title = 'Заявка №' . $model->id;

$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// todo: тоже самое - номер из insalon:
$this->params['breadcrumbs'][] = 'Заявка #'.$model->id. ' ('.$model->insalon->salon->name .')';
?>
<?php
$bank_css_class = '';
if( !$model->active ) {
    $bank_css_class = 'closed'; // закрыта банком
}else{
    $bank_css_class = 'request-status-'.$model->state_id; // статус
}

$salon_css_class = '';
if(!$model->insalon->active ){
    $salon_css_class = 'inactual'; // не актуально (в салоне)
}

?>

<? $bank_name = $model->bank->name ?>
<div class=<?= $bank_css_class?> >
    <h3><b><?= $bank_name.': '.$states[$model->state_id]
            .' / '.($model->active?'Открыта':'Закрыта'); ?>
</div>
<? $salon_name = $model->insalon->salon->name ?>
<div class=<?= $salon_css_class?> >
    <h3><b><?= $salon_name.': '
            .($model->insalon->active?'Актуальна':'Неактуальна')
             ?></b></h3>
</div>


    <? if( $msgs = Yii::$app->session->getFlash('inbank_update') ): ?>
        <? foreach( $msgs as $msg ): ?>
            <div class="alert alert-success">
                <?= $msg ?>
            </div>
        <? endforeach; ?>
    <? endif; ?>

<div class="inbank-update">

    <?= $this->render('_form', [
        'model' => $model,
        'states'=>$states,
        'can_close'=>$can_close,
    ]) ?>

</div>



