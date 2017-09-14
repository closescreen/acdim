
<? use yii\widgets\LinkPager; ?>

<h1>Организации</h1>
<ul>
<? foreach( $orgs as $org ): ?>
    <li><b><a href="<?= Yii::$app->urlManager->createUrl(['site/org','id'=>$org->id]) ?>"><?= $org->name ?></a> [ <?= $org->org_type_id ?> ] </b></li>
<? endforeach;?>
</ul>

<?= LinkPager::widget( ['pagination' => $pagination ]) ?>

