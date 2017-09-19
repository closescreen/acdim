
<? use yii\widgets\LinkPager; ?>

<h1>Пользователи</h1>

<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
// use app\models\Orgs;
use yii\helpers\Url;
use yii\helpers\Html;

$dataProvider->sort->attributes['org.name'] = [
    'asc' => ['org.name' => SORT_ASC],
    'desc' => ['org.name' => SORT_DESC],
];


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



<?php
/*
$dataProvider = new ActiveDataProvider([
    'query' => $query, 
//    'pagination' => [
//        'pageSize' => 15,
//    ],
]);

$dataProvider->sort->attributes['org.name'] = [
    'asc' => ['org.name' => SORT_ASC],
    'desc' => ['org.name' => SORT_DESC],
];

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
*/        
        //['class' => 'yii\grid\SerialColumn'], // добавляет номер в колонке #1
//        'id',
/*        [
            'value'=> function($data){
                return Html::a( $data->name, Url::to(['org/view', 'id' => $data->id]));
            },
            'label'=>'название', 
            'format'=>'html'
        ],
        [ 
            'value'=>'org_type_id',
            'label'=>'Тип',
        ],
*/        // Более сложный пример.
/*        [
            'class' => 'yii\grid\DataColumn', // может быть опущено, поскольку является значением по умолчанию
            'format'=>'html', // 'raw'|'text| ['date', 'php:Y-m-d']'
            'value' => function ($data) {
                return Html::a( 'Удалить', Url::to(['org/del', 'id' => $data->id]) , $options = [] );
                //return Yii::$app->urlManager->createUrl(['org/del', 'id' => $data->id]); 
                //Url::to(['org/del', 'id' => $data->id]); //$data->name; 
                // $data['name'] для массивов, например, при использовании SqlDataProvider.
            },
            'label' => ''
        ], 
*/

/*        'active','username','fio','org.name','org.org_type_id',

        [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{view} {update} {delete}',
        'buttons' => [
         // ...
             'delete' => function ($url, $model) {
                 return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['delete', 'id' => $model->id]), [
                    'title' => Yii::t('app', 'Удалить'),
                    'data' => [                               
                       'method' => 'post',
                       'confirm' => Yii::t('app', 'Удалить?'),
                    ]
                ]);
            },
        ],
     
        ],

    ],
]);
*/
?>