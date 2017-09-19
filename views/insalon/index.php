
<? use yii\widgets\LinkPager; ?>


<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
// use app\models\Orgs;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Салон';

// кнопка (только) на создание новой
echo Html::a('Создать заявку', ['/insalon/create'], ['class'=>'btn btn-primary']);


/* список заявок (табл insalon)
со ссылками на редактирование
*/




/*
$dataProvider->sort->attributes['org.name'] = [
    'asc' => ['org.name' => SORT_ASC],
    'desc' => ['org.name' => SORT_DESC],
];
*/

/*
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'active','username','fio','org.name',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}  {delete}',
        ],
     ],
    'rowOptions'=>function($model) {
        if (0 == $model->active) {
            return ['class' => 'disabled'];
        }
    }
]);
*/

/*
use yii\widgets\ActiveForm;

?>

<?php $f = ActiveForm::begin(['action'=>Url::to('user/create')]); ?>
<?= $f->field($newuser,'id')->hiddenInput()->label(false) ?>
<?= $f->field($newuser,'username')->label('логин'); ?>
<?= $f->field($newuser, 'password')->label('пароль') ?>
<?= $f->field($newuser, 'fio')->label('ФИО') ?>
<?= $f->field($newuser, 'active')->checkbox() ?>
<?= $f->field($newuser, 'org_id')->dropDownList($orgs) ?>
<?= Html::submitButton('Cоздать') ?>

<?php ActiveForm::end(); ?>
*/




