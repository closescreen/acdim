<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Org_bindings */

$this->title = Yii::t('app', 'Create Org Bindings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Org Bindings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-bindings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'orgs_model'=>$orgs_model,
    ]) ?>

</div>
