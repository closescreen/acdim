<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrgsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orgs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orgs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Создать новую организацию'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'org_type_id',
            'org_type.name',
            'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'rowOptions'=>function($model) {
            if ($model->active == 0) {
                return ['class' => 'inactual'];
            } else {
                return [];
            }
        }
    ]); ?>
</div>
