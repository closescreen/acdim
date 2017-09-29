<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orgs */

$this->title = Yii::t('app', 'Create Orgs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orgs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orgs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'org_types_model'=> $org_types_model,
    ]) ?>

</div>
