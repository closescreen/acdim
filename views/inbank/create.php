<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Inbank */

$this->title = 'Create Inbank';
$this->params['breadcrumbs'][] = ['label' => 'Inbanks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inbank-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
