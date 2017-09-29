<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Org_bindings */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Org Bindings',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Org Bindings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="org-bindings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'orgs_model'=>$orgs_model,
    ]) ?>

</div>
