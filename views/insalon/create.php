<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Insalon */

$this->title = 'Create Insalon';
$this->params['breadcrumbs'][] = ['label' => 'Insalons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insalon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
