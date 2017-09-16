
<? use yii\widgets\LinkPager; ?>

<h1>Организации</h1>

<!--
/* вручную

<?= $sort->link('name') . ' | ' . $sort->link('org_type_id'); ?>
<ul>
<? foreach( $orgs as $org ): ?>
    <li><b><a href="<?= Yii::$app->urlManager->createUrl(['orgs/org','id'=>$org->id]) ?>"><?= $org->name ?></a> [ <?= $org->org_type_id ?> ] </b></li>
<? endforeach;?>
</ul>

<?= LinkPager::widget( ['pagination' => $pagination ]) ?>
*/
-->

<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Orgs;
use yii\helpers\Url;
use yii\helpers\Html;


//$orgs = Orgs::find();

$dataProvider = new ActiveDataProvider([
    'query' => Orgs::find(),
    'pagination' => [
        'pageSize' => 15,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'], // добавляет номер в колонке #1
//        'id',
        [
            'value'=> function($data){
                return Html::a( $data->name, Url::to(['orgs/view', 'id' => $data->id]));
            },
            'label'=>'название', 
            'format'=>'html'
        ],
        [ 
            'value'=>'org_type_id',
            'label'=>'Тип',
        ],
        // Более сложный пример.
/*        [
            'class' => 'yii\grid\DataColumn', // может быть опущено, поскольку является значением по умолчанию
            'format'=>'html', // 'raw'|'text| ['date', 'php:Y-m-d']'
            'value' => function ($data) {
                return Html::a( 'Удалить', Url::to(['orgs/del', 'id' => $data->id]) , $options = [] );
                //return Yii::$app->urlManager->createUrl(['orgs/del', 'id' => $data->id]); 
                //Url::to(['orgs/del', 'id' => $data->id]); //$data->name; 
                // $data['name'] для массивов, например, при использовании SqlDataProvider.
            },
            'label' => ''
        ], 
*/
/*        [
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
*/
    ],
]);

?>