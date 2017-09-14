<p>Текущий: <?= $id ?></p>
<?php use app\components\Hello; 
?>

<div> Виджет говорит: <?= Hello::widget( ['message'=>'Hello world'] ) ?> </div>