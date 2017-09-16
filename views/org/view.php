<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\helpers\Html;
?>

<b><?= $orgs->name ?></b>

<?php

$dataProvider = new ActiveDataProvider([
    'query' => $org_bindings, 
    'pagination' => [
        'pageSize' => 15,
    ],
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
/*
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
    ],    
*/
]);


?>



